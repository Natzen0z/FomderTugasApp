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

  String? lastRefresh; // timestamp

  @override
  void initState() {
    super.initState();
    loadCachedPosts();
  }

  Future<void> loadCachedPosts() async {
    // Ambil posts
    final cachedPosts = await localService.loadPosts();
    final cachedTime = await localService.getLastRefresh();

    if (cachedPosts != null) {
      posts = cachedPosts;
      lastRefresh = cachedTime;

      setState(() => isLoading = false);

      // 🔥 Notifikasi Data from Cache
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(
          content: Text("Data from Cache"),
          duration: Duration(seconds: 2),
        ),
      );
    }

    // Background refresh
    loadFromAPI();
  }

  Future<void> loadFromAPI() async {
    try {
      List<Post> fresh = await apiService.fetchPosts();
      posts = fresh;
      isLoading = false;
      await localService.savePosts(fresh);

      lastRefresh = await localService.getLastRefresh();

      setState(() {});
    } catch (e) {
      print("API error: $e");
    }
  }

  Future<void> clearCache() async {
    await localService.clearCache();
    setState(() {
      posts = [];
      lastRefresh = null;
    });

    ScaffoldMessenger.of(
      context,
    ).showSnackBar(const SnackBar(content: Text("Cache Cleared")));
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("Cached API Example"),
        actions: [
          IconButton(
            icon: const Icon(Icons.refresh),
            onPressed: () async {
              setState(() => isLoading = true);
              await loadFromAPI();
            },
          ),
          IconButton(icon: const Icon(Icons.delete), onPressed: clearCache),
        ],
      ),
      body: isLoading
          ? const Center(child: CircularProgressIndicator())
          : Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                if (lastRefresh != null)
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      "Last Refresh: $lastRefresh",
                      style: const TextStyle(fontSize: 12),
                    ),
                  ),
                Expanded(
                  child: ListView.builder(
                    itemCount: posts.length,
                    itemBuilder: (context, index) {
                      final p = posts[index];
                      return ListTile(
                        title: Text(p.title),
                        subtitle: Text(p.body),
                      );
                    },
                  ),
                ),
              ],
            ),
    );
  }
}
