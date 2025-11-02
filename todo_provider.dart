import 'package:flutter/material.dart';

class TodoProvider extends ChangeNotifier {
  final List<String> _items = [];

  List<String> get items => _items;

  void addItem(String value) {
    if (value.trim().isEmpty) return;
    _items.add(value);
    notifyListeners();
  }
}
