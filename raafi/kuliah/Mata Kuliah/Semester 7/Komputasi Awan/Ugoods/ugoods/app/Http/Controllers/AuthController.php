<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Show registration view.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration and KTM file upload.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'phone' => ['nullable', 'string', 'max:30'],
            'ktm_image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
            'ktm_file' => ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'],
            'campus_cod_location' => ['nullable', 'string', 'max:255'],
            'kos_address' => ['nullable', 'string'],
        ], [
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain atau masuk ke akun kamu.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal harus terdiri dari 8 karakter.',
            'ktm_image.mimes' => 'Format file KTM harus berupa JPG, PNG, atau PDF.',
            'ktm_file.mimes' => 'Format file KTM harus berupa JPG, PNG, atau PDF.',
            'ktm_image.max' => 'Ukuran file KTM maksimal 3 MB.',
            'ktm_file.max' => 'Ukuran file KTM maksimal 3 MB.',
        ]);

        // Upload KTM image to storage/app/public/ktm
        $ktmPath = null;
        if ($request->hasFile('ktm_image')) {
            $ktmPath = $request->file('ktm_image')->store('ktm', 'public');
        } elseif ($request->hasFile('ktm_file')) {
            $ktmPath = $request->file('ktm_file')->store('ktm', 'public');
        }

        $whatsapp = $request->input('whatsapp_number') ?? $request->input('phone');
        $codLocation = $request->input('campus_cod_location') ?? 'Lobi Gedung Kuliah Terpadu Polimedia';

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'whatsapp_number' => $whatsapp,
            'ktm_image' => $ktmPath,
            'ktm_status' => 'pending',
            'role' => 'user',
            'campus_cod_location' => $codLocation,
            'kos_address' => $request->input('kos_address'),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Selamat datang di ugoods, ' . $user->name . '! Akun kamu berhasil terdaftar.');
    }

    /**
     * Show login view.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi yang kamu masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Handle user profile update including avatar upload.
     */
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'campus_cod_location' => ['nullable', 'string', 'max:255'],
            'kos_address' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ], [
            'email.unique' => 'Email ini sudah digunakan oleh akun lain.',
            'avatar.image' => 'Berkas yang diunggah harus berupa gambar.',
            'avatar.mimes' => 'Format foto profil harus JPG, PNG, atau WEBP.',
            'avatar.max' => 'Ukuran foto profil maksimal 2 MB.',
        ]);

        // Tangani unggah foto avatar baru
        if ($request->hasFile('avatar')) {
            // Hapus berkas foto lama jika ada di disk public
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Simpan foto baru ke folder storage/app/public/avatars
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->whatsapp_number = $validated['whatsapp_number'] ?? $user->whatsapp_number;
        $user->campus_cod_location = $validated['campus_cod_location'] ?? $user->campus_cod_location;
        $user->kos_address = $validated['kos_address'] ?? $user->kos_address;
        $user->save();

        return redirect()->back()->with('success', 'Profil dan foto berhasil diperbarui!');
    }

    /**
     * Show public profile for a seller and their products.
     */
    public function showPublicProfile($id)
    {
        $seller = User::with([
            'products' => function ($query) {
                $query->where('status', 'available')->latest();
            }
        ])->findOrFail($id);

        return view('profile.public', compact('seller'));
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('info', 'Kamu telah keluar dari akun ugoods.');
    }
}