import 'package:shared_preferences/shared_preferences.dart';

class LocalStorageService {
  static const String keyPosts = "cached_posts";

  Future<void> savePosts(String jsonString) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(keyPosts, jsonString);
  }

  Future<String?> getPosts() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString(keyPosts);
  }
}
