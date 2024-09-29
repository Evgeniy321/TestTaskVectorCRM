<?php
include('connection.php');

header('Content-Type: application/json; charset=utf-8');
$categories = execute('SELECT id, name, parent_id FROM categories');

// Функция для построения дерева категорий
function buildTree(array $categories, $parentId = null) {
    $branch = [];

    foreach ($categories as $category) {
        if ($category['parent_id'] === $parentId) {
            $children = buildTree($categories, $category['id']);
            if ($children) {
                $category['children'] = $children;
            } else {
                $category['children'] = [];
            }
            $branch[] = $category;
        }
    }

    return $branch;
}

// Построение дерева категорий
$categoryTree = buildTree($categories);

// Вывод результата в формате JSON
echo json_encode($categoryTree, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
