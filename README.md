# スケジュール共有アプリ（まずは自分のぶんだけ）

## アプリケーションの概要
スケジュールを作成し、予定が近い順で表示できる
スケジュールアプリでありそうな基本的な登録アイテムを持ったDBを作成

- schedule
  - 件名
  - 開始日・終了日
  - 開始時刻・終了時刻
  - 終日フラグ
  - メモ欄

- group（userと多対多のリレーション）　**[追加]**
  - group名

- API(user認証・登録、scheduleのCRUD処理、group参照)　**[追加]**

## 実装した機能
  - スケジュールの登録・表示・変更・削除機能

## 工夫した点#
- 不要な情報を表示しない工夫
  - 終日フラグオン時に表示内容を省略する
- ユーザー入力をシンプルにするための工夫
  - 終了日が決まっていない場合は開始日同日の値を代入する
- スケジュールのバリデーションを修正未入力を自動補完し、バリデーションを通処理を追加　**[追加]**



## 苦戦した点
- chkbox の状態をbooleanに変換して登録する仕様にしているため、表示時に逆変換が必要で困った。

## 今後やること
- 他ユーザーとの計画共有
- 他ユーザーと共有するイベントの承認機能（わかったよボタン）
- 直近の予定・日付指定の予定の参照機能
- linebotで紹介できるようにしたい（できたら）