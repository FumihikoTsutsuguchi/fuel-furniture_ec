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
  * 管理者 : オーナーの管理
  * オーナー : 商品の出品・管理
  * ユーザー : 商品の購入
* 商品の閲覧・購入
  * Stripe決済
* 商品検索
  

