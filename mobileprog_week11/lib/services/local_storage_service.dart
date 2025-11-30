import 'dart:convert';
import 'package:shared_preferences/shared_preferences.dart';
import '../models/post.dart';

class LocalStorageService {
  static const String keyPosts = "cached_posts";
  static const String keyTimestamp = "last_refresh";

  Future<void> savePosts(List<Post> posts) async {
    final prefs = await SharedPreferences.getInstance();

    // Encode list model → JSON String
    String jsonString = jsonEncode(posts.map((e) => e.toJson()).toList());

    await prefs.setString(keyPosts, jsonString);
    await prefs.setString(keyTimestamp, DateTime.now().toIso8601String());
  }

  Future<List<Post>?> loadPosts() async {
    final prefs = await SharedPreferences.getInstance();
    final jsonString = prefs.getString(keyPosts);

    if (jsonString == null) return null;

    List jsonData = jsonDecode(jsonString);
    return jsonData.map((e) => Post.fromJson(e)).toList();
  }

  Future<String?> getLastRefresh() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString(keyTimestamp);
  }

  Future<void> clearCache() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove(keyPosts);
    await prefs.remove(keyTimestamp);
  }
}
