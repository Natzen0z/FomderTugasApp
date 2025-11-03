import 'package:flutter/material.dart';

void main() => runApp(const MyApp());

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Form Login',
      home: const LoginPage(),
    );
  }
}

//latihan 2
class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final _formKey = GlobalKey<FormState>();
  final _emailController = TextEditingController();
  final _passwordController = TextEditingController();
  final _confirmController = TextEditingController();

  bool isValidEmail(String email) {
    return RegExp(r'^[^@]+@[^@]+\.[^@]+').hasMatch(email);
  }

  bool isValidPassword(String password) {
    return password.length >= 6;
  }

  bool isPasswordMatch(String confirmPassword) {
    return confirmPassword == _passwordController.text;
  }

  Widget buildConfirmPasswordField() {
    return TextFormField(
      controller: _confirmController,
      obscureText: true,
      autovalidateMode: AutovalidateMode.onUserInteraction,
      decoration: const InputDecoration(
        labelText: 'Konfirmasi Password',
        border: OutlineInputBorder(),
      ),
      validator: (value) {
        if (value == null || value.isEmpty) {
          return 'Konfirmasi password wajib diisi';
        } else if (!isPasswordMatch(value)) {
          return 'Password tidak cocok';
        }
        return null;
      },
    );
  }

  @override
  void dispose() {
    _emailController.dispose();
    _passwordController.dispose();
    _confirmController.dispose();
    super.dispose();
  }

  //latihan 3
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Login Page')),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Form(
          key: _formKey,
          child: Column(
            children: [
              buildEmailField(), // pindah ke dalam state
              const SizedBox(height: 16),
              buildConfirmPasswordField(),
              const SizedBox(height: 16),
              buildPasswordField(), // pindah ke dalam state
              const SizedBox(height: 24),
              buildLoginButton(), // pindah ke dalam state
            ],
          ),
        ),
      ),
    );
  }

  //latihan 4 → FIX
  Widget buildEmailField() {
    return TextFormField(
      controller: _emailController,
      autovalidateMode: AutovalidateMode.onUserInteraction,
      decoration: const InputDecoration(
        labelText: 'Email',
        border: OutlineInputBorder(),
      ),
      validator: (value) {
        if (value == null || value.isEmpty) {
          return 'Email wajib diisi';
        } else if (!isValidEmail(value)) {
          return 'Format email tidak valid';
        }
        return null;
      },
    );
  }

  //latihan 5 → FIX
  Widget buildPasswordField() {
    return TextFormField(
      controller: _passwordController,
      obscureText: true,
      autovalidateMode: AutovalidateMode.onUserInteraction,
      decoration: const InputDecoration(
        labelText: 'Password',
        border: OutlineInputBorder(),
      ),
      validator: (value) {
        if (value == null || value.isEmpty) {
          return 'Password wajib diisi';
        } else if (!isValidPassword(value)) {
          return 'Minimal 6 karakter';
        }
        return null;
      },
    );
  }

  //latihan 6 → FIX
  Widget buildLoginButton() {
    return SizedBox(
      width: double.infinity,
      child: ElevatedButton(
        onPressed: () {
          if (_formKey.currentState!.validate()) {
            ScaffoldMessenger.of(context).showSnackBar(
              const SnackBar(
                content: Text('Login Berhasil!'),
                backgroundColor: Colors.green, // warna sukses
                behavior: SnackBarBehavior.floating,
              ),
            );
          } else {
            ScaffoldMessenger.of(context).showSnackBar(
              const SnackBar(
                content: Text('Periksa kembali input Anda'),
                backgroundColor: Colors.red, // warna error
                behavior: SnackBarBehavior.floating,
              ),
            );
          }
        },
        child: const Text('Login'),
      ),
    );
  }

//latihan 10 → SELESAI
}
