import 'dart:convert';
import 'package:flutter/material.dart';
import '../models/post.dart';
import '../services/api_service.dart';
import '../services/local_storage_service.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  List<Post> posts = [];
  bool isLoading = true;

  final apiService = ApiService();
  final localService = LocalStorageService();
  @override
  void initState() {
    super.initState();
    loadCachedPosts();
  }

  Future<void> loadCachedPosts() async {
    String? cached = await localService.getPosts();

    if (cached != null) {
      List jsonData = jsonDecode(cached);
      posts = jsonData.map((e) => Post.fromJson(e)).toList();
      setState(() => isLoading = false);
    }

    loadFromAPI(); // Silently update
  }

  Future<void> loadFromAPI() async {
    try {
      List<Post> fresh = await apiService.fetchPosts();
      setState(() {
        posts = fresh;
        isLoading = false;
      });

      localService.savePosts(jsonEncode(fresh.map((e) => e.toJson()).toList()));
    } catch (e) {
      print("API error: $e");
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Cached API Example"),
        actions: [
          IconButton(
            icon: Icon(Icons.refresh),
            onPressed: () async {
              setState(() => isLoading = true);
              await loadFromAPI();
            },
          ),
        ],
      ),
      body: isLoading
          ? Center(child: CircularProgressIndicator())
          : ListView.builder(
              itemCount: posts.length,
              itemBuilder: (context, index) {
                final p = posts[index];
                return ListTile(title: Text(p.title), subtitle: Text(p.body));
              },
            ),
    );
  }
}
