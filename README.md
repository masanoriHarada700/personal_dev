## Laravelプロジェクトベース

### 環境構築の前に
- 自身のDockerを最新のバージョンにアップデートする

※アップデートしていない場合、下記のエラーが発生することがございます。

https://stackoverflow.com/questions/77170536/laravel-sail-vendor-bin-sail-up-d-errorcode-100

- .envファイルを作成

※コマンドで作成できない場合は、手動で作成しましょう。
```
// macの場合
cp .env.example .env

// windowsの場合
copy .env.example .env
```

### 環境構築
- Dockerファイルを基にキャッシュを使用せずにDockerイメージをビルド

```
docker compose build --no-cache
```

- Dockerイメージを基にDockerコンテナを作成、起動する

```
docker compose up -d
```

- APP_KEYを設定する

laravelコンテナのコマンドラインインターフェースにアクセス

```
docker compose exec laravel.test bash
```

```
php artisan key:generate

// .envの以下項目が空白ではなく文字列が入っていることを確認
APP_KEY=
```

- URLにアクセスしサーバーが立ち上がっているか確認する。

```
http://localhost:3000
```

### 環境構築完了後、開発を進めたい時は
- Dockerイメージを基にDockerコンテナを作成、起動する

```
docker compose up -d
```

- ブラウザからURLでアクセスする

```
http://localhost:3000
```


### Laravelコマンドを使いたい時は

```
laravelコンテナのコマンドラインインターフェースにアクセス
docker compose exec laravel.test bash

// 以下の表示になればOK
/var/www/html#
```

### DBをGUIで操作したい時は

DBをGUIで操作したい場合、以下のようなツールがあります。

実務でもよく使われるため、インストールして今から使い方に慣れておきましょう。

- [pgadmin](https://www.pgadmin.org/)
- [dbeaver](https://dbeaver.io/)

### バージョン情報

name|version
--|--
PHP | 8.2.12
Laravel | 10.30.1
