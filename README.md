# FUEL-Furniture
## 概要
”こだわりを持ったライフスタイルの提供”をコンセプトに、 古着やアンティーク雑貨、アイアン家具(ハンドメイド)の販売をしている「FUEL」
その家具部門である「FUEL-Furniture」のECサイトです。

リンク : https://fuel-furniture.com


### アプリイメージ
* ユーザートップページ(商品一覧)
<img width="1442" alt="スクリーンショット 2024-06-23 21 18 45" src="https://github.com/FumihikoTsutsuguchi/fuel-furniture_ec/assets/115400802/bca3c5f3-b13d-49a8-98fa-f60ca4c93037">

* 管理者(管理画面)
<img width="1442" alt="スクリーンショット 2024-06-23 21 19 12" src="https://github.com/FumihikoTsutsuguchi/fuel-furniture_ec/assets/115400802/7d6d5c95-7f30-404e-991b-eb3f8f5cbf96">

* 店舗オーナー(管理画面)
<img width="1442" alt="スクリーンショット 2024-06-23 21 19 31" src="https://github.com/FumihikoTsutsuguchi/fuel-furniture_ec/assets/115400802/474c5e9c-fe39-4a9c-852e-88d97801dca2">

## 使用技術
### フロントエンド
* Bladeテンプレート(Laravel) 
* JavaScript
  * Micromodal.js
  * Swiper.js
* Sass(CSS)
* Taildwind CSS
### バックエンド
* Laravel
  * Breeze
* MySQL
* Stripe API
### インフラ ・ 開発環境
* Docker,Docker-compose
* AWS
  * EC2
  * RDS
  * S3
  * Route 53
  * CloudFront
  * CloudWatch
  * Simple Notification Service
  * Amazon Simple Email Service
## ER 図
![nLNDQXin4BxhAKGkFVdGdrC98ILG23sqK7fUbDLuBI9frD5iNMFdtIjfLRgELmHiIYxsw9lHp3S_chsDh8X7P-Lw1DkjH_A6HmBnHcwC1iaRa34WYtBg3VKMH5AgNsYq38GF5boKMyCRgVnWGSkUS1lb6e15V3G-A59EMkE1Tm4a4czG206U3U_arTUj1xgIAieYoRsGCdd-A1_CO3odqsgLVhnoaC24m02K073As8H49kE7](https://github.com/FumihikoTsutsuguchi/fuel-furniture_ec/assets/115400802/c05275e9-59f5-4ea9-9c46-942bfa2decee)

## インフラ構成図
![aws drawio (2)](https://github.com/FumihikoTsutsuguchi/fuel-furniture_ec/assets/115400802/418ab233-6f5d-41fb-afc1-ae3a24127ddc)

## 機能一覧
* マルチログイン機能
  * 管理者 : オーナーの追加・削除、オーナーのソフトデリート、プロフィールの編集
  * オーナー : 商品の出品、商品の編集(カテゴリ・在庫数・画像・表示順・価格など)、店舗情報の編集、プロフィール編集
  * ユーザー : 商品の閲覧・カート追加・購入、プロフィール編集
* 商品の閲覧・購入
  * Stripe決済
* 商品検索(カテゴリ・商品名検索、表示順・件数絞り込み)
  
## こだわった箇所
* フロントエンド
  * クライアントのプロダクトイメージに沿ったナチュラルなUI
  * アクセシビリティ(対応中)
    * Tabキー操作
    * 音声読み上げ機能への対応
  * Sassを用いてスタイルのコンポーネント化
* バックエンド
  * UX対応
    * フラッシュメッセージの表示
    * オーナーのソフトデリート対応
    * メール送信時の非同期処理(キュー&ジョブ)
  * DB
    * N+1問題への対応
    * 在庫数の排他制御
      * オーナー側にて、在庫数の編集〜更新の間でユーザが商品購入した際に在庫数の整合性を保つ
* インフラ
  * 開発時にDocker composeを使用
  * AWSを用いてサーバー(EC2)とデータベース(RDS)を分けて構築
    * RDSをプライベートサブネットに配置して、外部からアクセスできないようにした
  * S3とCloudFrontを用いて画像配信の高速化
  * Amazon SESで発生したバウンスや苦情を任意のメールアドレスへ通知
* セキュリティ対応
  * SQLインジェクション
  * XSS
  * CSRF
* その他
  * Prettierを用いたコード整形
  * Code Spell Checkerでスペルミスのチェック
  * 静的解析ツール(larastan)の使用