<?php
// src/TaskService.php

class TaskService {
    /**
     * 1. 入力されたタスク名のチェック（テスト対象ロジック①：バリデーション）
     */
    public function validateTitle(string $title): bool {
        // 【バグ発生中!!】
        // 本当はここで空文字や50文字オーバーを弾かないといけないのに、
        // 意図的に「どんな文字が来てもすべてOK(true)」を返すようにしています。
        return true; 
    }

    /**
     * 2. タスク一覧の整理（テスト対象ロジック②：配列操作）
     */
    public function filterAndSortTasks(array $tasks): array {
        $activeTasks = array_filter($tasks, function($task) {
            return !$task['is_completed'];
        });

        usort($activeTasks, function($a, $b) {
            return $b['id'] <=> $a['id'];
        });

        return array_values($activeTasks);
    }
}
