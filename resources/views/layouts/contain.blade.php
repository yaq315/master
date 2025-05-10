<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LeafyLand</title>
    <!-- Fonts, Icons, Bootstrap, and Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    
<style>
    /* [Master Stylesheet] */
/*
Template Name: Alazea - Gardening &amp; Landscaping HTML Template
Text Domain: Alazea, Gardening & Landscaping
Version: - v1.0
*/
/* :: 1.0 Import Fonts */
@import url("https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800");
/* :: 2.0 Import All CSS */
@import url(css/bootstrap.min.css);
@import url(css/classy-nav.css);
@import url(css/owl.carousel.min.css);
@import url(css/elegant-icon.css);
/* @import url(css/animate.css); */
/* @import url(css/magnific-popup.css); */
/* @import url(css/font-awesome.min.css); */
/* @import url(css/elegant-icon.css); */
/* :: 3.0 Base CSS */
* {
  margin: 0;
  padding: 0; }

body {
  font-family: "Dosis", sans-serif;
  font-size: 16px;
  color: #707070; }

h1,
h2,
h3,
h4,
h5,
h6 {
  color: #303030;
  line-height: 1.3;
  font-weight: 500; }

p {
  color: #707070;
  font-size: 16px;
  line-height: 1.7;
  font-weight: 400; }

a,
a:hover,
a:focus {
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms;
  text-decoration: none;
  outline: 0 solid transparent;
  color: #303030;
  font-weight: 500;
  font-size: 14px; }

ul,
ol {
  margin: 0; }
  ul li,
  ol li {
    list-style: none; }

img {
  height: auto;
  max-width: 100%; }

/* :: 3.1.0 Spacing */
.mt-15 {
  margin-top: 15px !important; }

.mt-30 {
  margin-top: 30px !important; }

.mt-50 {
  margin-top: 50px !important; }

.mt-70 {
  margin-top: 70px !important; }

.mt-100 {
  margin-top: 100px !important; }

.mb-15 {
  margin-bottom: 15px !important; }

.mb-30 {
  margin-bottom: 30px !important; }

.mb-50 {
  margin-bottom: 50px !important; }

.mb-70 {
  margin-bottom: 70px !important; }

.mb-100 {
  margin-bottom: 100px !important; }

.ml-15 {
  margin-left: 15px !important; }

.ml-30 {
  margin-left: 30px !important; }

.ml-50 {
  margin-left: 50px !important; }

.mr-15 {
  margin-right: 15px !important; }

.mr-30 {
  margin-right: 30px !important; }

.mr-50 {
  margin-right: 50px !important; }

/* :: 3.2.0 Height */
.height-400 {
  height: 400px; }

.height-500 {
  height: 500px; }

.height-600 {
  height: 600px; }

.height-700 {
  height: 700px; }

.height-800 {
  height: 800px; }

/* :: 3.3.0 Section Padding */
.section-padding-100 {
  padding-top: 100px;
  padding-bottom: 100px; }

.section-padding-100-0 {
  padding-top: 100px;
  padding-bottom: 0; }

.section-padding-0-100 {
  padding-top: 0;
  padding-bottom: 100px; }

.section-padding-100-70 {
  padding-top: 100px;
  padding-bottom: 70px; }

/* :: 3.4.0 Section Heading */
.section-heading {
  position: relative;
  z-index: 1;
  margin-bottom: 40px; }
  .section-heading h2 {
    font-size: 30px;
    text-transform: uppercase;
    margin-bottom: 0; }
    @media only screen and (max-width: 767px) {
      .section-heading h2 {
        font-size: 24px; } }
  .section-heading p {
    font-size: 16px;
    color: #707070;
    margin-bottom: 0; }

/* :: 3.5.0 Preloader */
.preloader {
  background-color: #f2f4f5;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 999999;
  overflow: hidden; }
  .preloader .preloader-circle {
    width: 80px;
    height: 80px;
    position: relative;
    border-style: solid;
    border-width: 2px;
    border-top-color: #70c745;
    border-bottom-color: transparent;
    border-left-color: transparent;
    border-right-color: transparent;
    z-index: 10;
    border-radius: 50%;
    box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.15);
    background-color: #ffffff;
    -webkit-animation: zoom 2000ms infinite ease;
    animation: zoom 2000ms infinite ease; }
  .preloader .preloader-img {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    z-index: 200; }
    .preloader .preloader-img img {
      max-width: 45px; }

@-webkit-keyframes zoom {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg); }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg); } }
@keyframes zoom {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg); }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg); } }
/* :: 3.6.0 Miscellaneous */
.bg-img {
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat; }

.bg-white {
  background-color: #ffffff !important; }

.bg-dark {
  background-color: #000000 !important; }

.bg-transparent {
  background-color: transparent !important; }

.font-bold {
  font-weight: 700; }

.font-light {
  font-weight: 300; }

.bg-overlay {
  position: relative;
  z-index: 2;
  background-position: center center;
  background-size: cover; }
  .bg-overlay::after {
    background-color: rgba(17, 17, 17, 0.5);
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: ""; }

.bg-fixed {
  background-attachment: fixed !important; }

.bg-gray {
  background-color: #f2f4f5; }

/* :: 3.7.0 ScrollUp */
#scrollUp {
  background-color: #70c745;
  border-radius: 0;
  bottom: 0;
  box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.3);
  color: #ffffff;
  font-size: 24px;
  height: 40px;
  line-height: 40px;
  right: 50px;
  text-align: center;
  width: 40px;
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms; }
  #scrollUp:hover {
    background-color: #303030; }

/* :: 3.8.0 alazea Button */
.alazea-btn {
  -webkit-transition-duration: 400ms;
  transition-duration: 400ms;
  position: relative;
  z-index: 1;
  display: inline-block;
  min-width: 150px;
  height: 46px;
  color: #ffffff;
  background-color: #70c745;
  border: 2px solid #70c745;
  border-radius: 50px;
  padding: 0 20px;
  font-size: 16px;
  line-height: 42px;
  text-transform: uppercase;
  font-weight: 600; }
  .alazea-btn.active, .alazea-btn:hover, .alazea-btn:focus {
    font-size: 16px;
    color: #70c745;
    font-weight: 600;
    background-color: transparent;
    box-shadow: none; }

/* :: 4.0 Header Area CSS */
.header-area {
  position: absolute;
  width: 100%;
  z-index: 999;
  top: 0;
  left: 0;
  background-color: transparent; }
  .header-area .top-header-area {
    position: relative;
    z-index: 100;
    background-color: transparent;
    width: 100%;
    height: 42px;
    border-bottom: 1px solid rgba(235, 235, 235, 0.2); }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .header-area .top-header-area {
        z-index: 1; } }
    @media only screen and (max-width: 767px) {
      .header-area .top-header-area {
        z-index: 1; } }
    .header-area .top-header-area .top-header-content {
      position: relative;
      z-index: 1;
      height: 41px; }
      .header-area .top-header-area .top-header-content .top-header-meta a {
        display: inline-block;
        font-size: 12px;
        font-weight: 400;
        color: #ffffff;
        line-height: 1; }
        .header-area .top-header-area .top-header-content .top-header-meta a:first-child {
          margin-right: 30px; }
        .header-area .top-header-area .top-header-content .top-header-meta a i {
          margin-right: 5px;
          color: #70c745; }
        @media only screen and (max-width: 767px) {
          .header-area .top-header-area .top-header-content .top-header-meta a span {
            display: none; } }
      .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown {
        position: relative;
        z-index: 1; }
        .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown::after {
          width: 1px;
          height: 100%;
          background-color: rgba(235, 235, 235, 0.2);
          content: '';
          top: 0;
          right: 15px;
          z-index: 2;
          position: absolute; }
        .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown .btn {
          padding: 0;
          background-color: transparent;
          border: none;
          font-size: 12px; }
          .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown .btn:focus {
            box-shadow: none; }
        .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown .dropdown-menu {
          /* background-color: #70c745; */
          border: none;
          box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.15); }
          @media only screen and (min-width: 768px) and (max-width: 991px) {
            .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown .dropdown-menu {
              top: 90px !important; } }
          @media only screen and (max-width: 767px) {
            .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown .dropdown-menu {
              min-width: 100px;
              top: 70px !important; } }
          .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown .dropdown-menu .dropdown-item:focus,
          .header-area .top-header-area .top-header-content .top-header-meta .language-dropdown .dropdown-menu .dropdown-item:hover {
            color: #ffffff;
            background-color: #111111; }
      .header-area .top-header-area .top-header-content .top-header-meta .cart {
        position: relative;
        z-index: 1; }
        .header-area .top-header-area .top-header-content .top-header-meta .cart::after {
          width: 1px;
          height: 100%;
          background-color: rgba(235, 235, 235, 0.2);
          content: '';
          top: 0;
          left: -15px;
          z-index: 2;
          position: absolute; }
        .header-area .top-header-area .top-header-content .top-header-meta .cart a {
          margin-right: 0; }
  .header-area .alazea-main-menu {
    position: relative;
    z-index: 1;
    -webkit-transition-duration: 200ms;
    transition-duration: 200ms; }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .header-area .alazea-main-menu .classy-navbar .classy-menu {
        background-color: #111111; } }
    @media only screen and (max-width: 767px) {
      .header-area .alazea-main-menu .classy-navbar .classy-menu {
        background-color: #111111; } }
    .header-area .alazea-main-menu .classy-nav-container {
      background-color: transparent; }
    .header-area .alazea-main-menu .classy-navbar {
      height: 90px;
      padding: 0; }
      .header-area .alazea-main-menu .classy-navbar .nav-brand {
        line-height: 1; }
      @media only screen and (max-width: 767px) {
        .header-area .alazea-main-menu .classy-navbar {
          height: 70px; } }
    .header-area .alazea-main-menu .classynav ul li a {
      padding: 0 30px;
      font-weight: 500;
      text-transform: capitalize;
      font-size: 20px;
      color: #ffffff; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .header-area .alazea-main-menu .classynav ul li a {
          font-size: 18px;
          padding: 0 20px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .header-area .alazea-main-menu .classynav ul li a {
          background-color: #111111;
          font-size: 16px;
          color: #ffffff;
          border-bottom: none; } }
      @media only screen and (max-width: 767px) {
        .header-area .alazea-main-menu .classynav ul li a {
          background-color: #111111;
          font-size: 16px;
          color: #ffffff;
          border-bottom: none; } }
      .header-area .alazea-main-menu .classynav ul li a:hover, .header-area .alazea-main-menu .classynav ul li a:focus {
        color: #70c745; }
      .header-area .alazea-main-menu .classynav ul li a::after {
        color: #ffffff; }
    .header-area .alazea-main-menu .classynav ul li ul li a {
      padding: 0 20px;
      color: #303030;
      font-size: 14px;
      border-bottom: none; }
      .header-area .alazea-main-menu .classynav ul li ul li a::after {
        color: #303030; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .header-area .alazea-main-menu .classynav ul li ul li a::after {
            color: #ffffff; } }
        @media only screen and (max-width: 767px) {
          .header-area .alazea-main-menu .classynav ul li ul li a::after {
            color: #ffffff; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .header-area .alazea-main-menu .classynav ul li ul li a {
          padding: 0 45px;
          color: #ffffff; } }
      @media only screen and (max-width: 767px) {
        .header-area .alazea-main-menu .classynav ul li ul li a {
          padding: 0 45px;
          color: #ffffff; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .header-area .alazea-main-menu .classy-navbar-toggler .navbarToggler span {
        background-color: #ffffff; } }
    @media only screen and (max-width: 767px) {
      .header-area .alazea-main-menu .classy-navbar-toggler .navbarToggler span {
        background-color: #ffffff; } }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .header-area .alazea-main-menu .classycloseIcon .cross-wrap span {
        background: #ffffff; } }
    @media only screen and (max-width: 767px) {
      .header-area .alazea-main-menu .classycloseIcon .cross-wrap span {
        background: #ffffff; } }
    .header-area .alazea-main-menu .search-form {
      position: relative;
      z-index: 1;
      opacity: 0;
      visibility: hidden;
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms; }
      .header-area .alazea-main-menu .search-form form {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        position: absolute;
        top: 0;
        right: 0;
        z-index: 100;
        background-color: #ffffff;
        width: 500px;
        border-radius: 5px;
        padding: 30px;
        box-shadow: 0 3px 40px 0 rgba(0, 0, 0, 0.15); }
        @media only screen and (max-width: 767px) {
          .header-area .alazea-main-menu .search-form form {
            width: 290px;
            padding: 20px; } }
        .header-area .alazea-main-menu .search-form form input {
          width: 100%;
          height: 45px;
          border: 1px solid #ebebeb;
          padding: 0 30px;
          border-radius: 5px;
          font-size: 14px; }
          @media only screen and (max-width: 767px) {
            .header-area .alazea-main-menu .search-form form input {
              padding: 0 15px; } }
      .header-area .alazea-main-menu .search-form .closeIcon {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        position: absolute;
        top: 41px;
        right: 60px;
        z-index: 200;
        cursor: pointer;
        color: #707070; }
        .header-area .alazea-main-menu .search-form .closeIcon:hover {
          color: #70c745; }
        @media only screen and (max-width: 767px) {
          .header-area .alazea-main-menu .search-form .closeIcon {
            top: 31px;
            right: 35px; } }
      .header-area .alazea-main-menu .search-form.active {
        opacity: 1;
        visibility: visible; }
  .header-area .is-sticky .alazea-main-menu {
    background-color: #111111;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 9999;
    box-shadow: 0 5px 50px 15px rgba(0, 0, 0, 0.2); }
  .header-area #searchIcon {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    color: #ffffff;
    font-size: 20px;
    cursor: pointer;
    margin-left: 50px; }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .header-area #searchIcon {
        margin-left: 30px;
        margin-top: 15px; } }
    @media only screen and (max-width: 767px) {
      .header-area #searchIcon {
        margin-left: 30px;
        margin-top: 15px; } }
    .header-area #searchIcon:hover, .header-area #searchIcon:focus {
      color: #70c745; }

/* :: 5.0 Hero Slides Area */
.hero-area,
.hero-post-slides {
  position: relative;
  z-index: 1; }

.single-hero-post {
  width: 100%;
  height: 930px;
  position: relative;
  z-index: 3;
  overflow: hidden; }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .single-hero-post {
      height: 690px; } }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .single-hero-post {
      height: 600px; } }
  @media only screen and (max-width: 767px) {
    .single-hero-post {
      height: 650px; } }
  @media only screen and (min-width: 480px) and (max-width: 767px) {
    .single-hero-post {
      height: 500px; } }
  .single-hero-post .slide-img {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -10;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0; }
  .single-hero-post .hero-slides-content {
    position: relative;
    z-index: 1;
    margin-top: 100px; }
    @media only screen and (max-width: 767px) {
      .single-hero-post .hero-slides-content {
        margin-top: 112px; } }
    .single-hero-post .hero-slides-content h2 {
      font-size: 45px;
      letter-spacing: 1px;
      color: #ffffff;
      text-transform: uppercase; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .single-hero-post .hero-slides-content h2 {
          font-size: 36px; } }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .single-hero-post .hero-slides-content h2 {
          font-size: 30px; } }
      @media only screen and (max-width: 767px) {
        .single-hero-post .hero-slides-content h2 {
          font-size: 24px; } }
    .single-hero-post .hero-slides-content p {
      font-size: 18px;
      color: #ffffff;
      margin-bottom: 50px; }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .single-hero-post .hero-slides-content p {
          font-size: 18px; } }
      @media only screen and (max-width: 767px) {
        .single-hero-post .hero-slides-content p {
          font-size: 16px; } }
    @media only screen and (max-width: 767px) {
      .single-hero-post .hero-slides-content a {
        min-width: 125px;
        padding: 0 10px; } }

.hero-post-slides .owl-item.center .single-hero-post .slide-img {
  -webkit-animation: slide 24s linear infinite;
  animation: slide 24s linear infinite; }

@-webkit-keyframes slide {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1); }
  50% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3); }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1); } }
@keyframes slide {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1); }
  50% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3); }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1); } }
/* :: 6.0 Subscribe Newsletter Area */
.subscribe-newsletter-area {
  position: relative;
  z-index: 1;
  padding: 60px 0;
  background-size: cover;
  background-position: top right; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .subscribe-newsletter-area .subscribe-form {
      margin-top: 50px; } }
  @media only screen and (max-width: 767px) {
    .subscribe-newsletter-area .subscribe-form {
      margin-top: 50px; } }
  .subscribe-newsletter-area .subscribe-form form {
    position: relative;
    z-index: 1; }
    .subscribe-newsletter-area .subscribe-form form input {
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms;
      width: 100%;
      height: 46px;
      background-color: #ffffff;
      padding: 10px 20px;
      border: none; }
      .subscribe-newsletter-area .subscribe-form form input:focus {
        box-shadow: 0 1px 15px rgba(0, 0, 0, 0.15); }
    .subscribe-newsletter-area .subscribe-form form button {
      position: absolute;
      top: 0;
      right: 0;
      z-index: 10;
      border: none;
      border-radius: 0 2px 2px 0; }
  .subscribe-newsletter-area .subscribe-side-thumb .first-img {
    position: absolute;
    top: -30px;
    left: 5%;
    z-index: 10; }

/* :: 7.0 New Arrivals Products Area */
.single-product-area {
  position: relative;
  z-index: 1;
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms; }
  .single-product-area .product-img {
    position: relative;
    z-index: 1;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms; }
    .single-product-area .product-img a {
      display: block; }
    .single-product-area .product-img img {
      position: relative;
      z-index: 1;
      width: 100%; }
    .single-product-area .product-img .product-tag a {
      background-color: #429edf;
      border-radius: 2px;
      display: inline-block;
      height: 20px;
      padding: 0 10px;
      line-height: 20px;
      text-transform: uppercase;
      color: #ffffff;
      font-weight: 700;
      font-size: 12px;
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 10; }
    .single-product-area .product-img .product-tag.sale-tag a {
      background-color: #e61d47; }
    .single-product-area .product-img .product-meta {
      position: absolute;
      bottom: 30px;
      left: 15px;
      right: 15px;
      z-index: 100;
      visibility: hidden;
      opacity: 0;
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms; }
      .single-product-area .product-img .product-meta a {
        font-size: 16px;
        color: #ffffff;
        font-weight: 600;
        background-color: #303030;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50px;
        flex: 0 0 50px;
        max-width: 50px;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-transform: uppercase;
        text-align: center; }
        .single-product-area .product-img .product-meta a:hover, .single-product-area .product-img .product-meta a:focus {
          background-color: #70c745; }
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
          .single-product-area .product-img .product-meta a {
            font-size: 11px; } }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .single-product-area .product-img .product-meta a {
            font-size: 11px; } }
        @media only screen and (max-width: 767px) {
          .single-product-area .product-img .product-meta a {
            font-size: 14px; } }
      .single-product-area .product-img .product-meta .add-to-cart-btn {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 calc(100% - 100px);
        flex: 0 0 calc(100% - 100px);
        max-width: calc(100% - 100px);
        width: calc(100% - 100px);
        border-left: 1px solid rgba(235, 235, 235, 0.5);
        border-right: 1px solid rgba(235, 235, 235, 0.5); }
  .single-product-area .product-info a p {
    margin-bottom: 0;
    -webkit-transition-duration: 300ms;
    transition-duration: 300ms; }
    .single-product-area .product-info a p:hover, .single-product-area .product-info a p:focus {
      color: #70c745; }
  .single-product-area .product-info h6 {
    margin-bottom: 0;
    font-size: 18px; }
  .single-product-area:hover .product-img {
    box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.15); }
    .single-product-area:hover .product-img .product-meta {
      visibility: visible;
      opacity: 1; }

/* :: 8.0 Shop Page Area CSS */
.shop-sorting-data {
  position: relative;
  z-index: 1;
  padding-bottom: 25px;
  margin-bottom: 50px;
  border-bottom: 1px solid #ebebeb; }
  @media only screen and (max-width: 767px) {
    .shop-sorting-data .shop-page-count {
      margin-bottom: 30px; } }
  .shop-sorting-data .shop-page-count p {
    font-size: 18px;
    color: #707070;
    margin-bottom: 0;
    font-weight: 500; }
  .shop-sorting-data .search_by_terms {
    position: relative;
    z-index: 1; }
    .shop-sorting-data .search_by_terms select {
      width: 180px;
      height: 40px;
      color: #51545f;
      font-size: 16px;
      background-color: #f5f5f5;
      border: 1px solid #ebebeb;
      border-radius: 2px;
      margin-left: 30px; }
      @media only screen and (max-width: 767px) {
        .shop-sorting-data .search_by_terms select {
          margin-left: 0;
          margin-bottom: 15px; } }
      @media only screen and (min-width: 480px) and (max-width: 767px) {
        .shop-sorting-data .search_by_terms select {
          margin-left: auto;
          margin-right: 15px;
          margin-bottom: 0; } }
      .shop-sorting-data .search_by_terms select:focus {
        box-shadow: none; }

.shop-widget {
  position: relative;
  z-index: 1; }
  .shop-widget .widget-title {
    text-transform: uppercase;
    margin-bottom: 20px; }
  .shop-widget .custom-control .custom-control-label {
    font-size: 16px;
    color: #707070; }
  .shop-widget .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
    background-color: #70c745; }
  .shop-widget .single-best-seller-product {
    position: relative;
    z-index: 1;
    margin-bottom: 20px; }
    .shop-widget .single-best-seller-product::after {
      margin-bottom: 0; }
    .shop-widget .single-best-seller-product .product-thumbnail {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 70px;
      flex: 0 0 70px;
      max-width: 70px;
      width: 70px;
      margin-right: 30px; }
    .shop-widget .single-best-seller-product .product-info a {
      display: block;
      color: #707070;
      font-size: 16px;
      font-weight: 400;
      margin-bottom: 5px; }
      .shop-widget .single-best-seller-product .product-info a:hover, .shop-widget .single-best-seller-product .product-info a:focus {
        color: #303030; }
    .shop-widget .single-best-seller-product .product-info p {
      margin-bottom: 0;
      color: #303030;
      font-weight: 500; }
    .shop-widget .single-best-seller-product .product-info .ratings i {
      font-size: 12px;
      color: #ff9800; }

.slider-range-price {
  position: relative;
  z-index: 1; }

.shop-widget .ui-slider-handle {
  background-color: #70c745;
  border: none;
  border-radius: 50%;
  width: 12px;
  height: 12px;
  position: absolute;
  z-index: 30;
  top: -3px; }

.ui-slider-handle.first-handle {
  display: none !important; }

.shop-widget .ui-slider-range.ui-widget-header.ui-corner-all {
  background-color: #70c745;
  position: absolute;
  height: 6px;
  width: auto;
  z-index: 10;
  left: 2px !important; }

.shop-widget .ui-slider-horizontal {
  height: 6px;
  background-color: #f5f5f5;
  border-radius: 10px; }

.shop-widget .range-price {
  font-size: 16px;
  font-weight: 500;
  margin-top: 15px;
  text-transform: uppercase; }

.single_product_thumb {
  position: relative;
  z-index: 1; }
  @media only screen and (max-width: 767px) {
    .single_product_thumb {
      margin-bottom: 50px; } }
  .single_product_thumb .carousel-indicators {
    position: relative;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 15;
    margin-right: 0;
    margin-left: 0;
    margin-top: 30px; }
    .single_product_thumb .carousel-indicators li {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 100px;
      flex: 0 0 100px;
      width: 100px;
      height: 100px;
      margin-right: 15px;
      margin-left: 15px;
      cursor: pointer;
      border: 1px solid transparent;
      background-size: cover; }
      @media only screen and (max-width: 767px) {
        .single_product_thumb .carousel-indicators li {
          -webkit-box-flex: 0;
          -ms-flex: 0 0 60px;
          flex: 0 0 60px;
          width: 60px;
          height: 60px; } }
      .single_product_thumb .carousel-indicators li.active {
        border: 1px solid #70c745; }

.single_product_desc {
  position: relative;
  z-index: 1; }
  .single_product_desc .title {
    font-size: 30px;
    margin-bottom: 10px;
    text-transform: uppercase; }
    @media only screen and (max-width: 767px) {
      .single_product_desc .title {
        font-size: 24px; } }
  .single_product_desc .price {
    font-size: 26px;
    font-weight: 600;
    color: #70c745;
    margin-bottom: 30px; }
  .single_product_desc .short_overview {
    margin-bottom: 30px; }
    .single_product_desc .short_overview p {
      font-size: 14px; }
  .single_product_desc .cart--area {
    position: relative;
    z-index: 1;
    border-bottom: 1px solid #ebebeb;
    padding-bottom: 50px; }
  .single_product_desc .cart {
    position: relative;
    z-index: 1; }
    .single_product_desc .cart .quantity {
      position: relative;
      z-index: 1;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 130px;
      flex: 0 0 130px;
      max-width: 130px;
      width: 130px; }
      @media only screen and (min-width: 768px) and (max-width: 991px) {
        .single_product_desc .cart .quantity {
          -webkit-box-flex: 0;
          -ms-flex: 0 0 70px;
          flex: 0 0 70px;
          max-width: 70px;
          width: 70px; } }
      .single_product_desc .cart .quantity .qty-text {
        height: 46px;
        padding: 5px 15px;
        width: 130px;
        -moz-appearance: textfield;
        -webkit-appearance: textfield;
        appearance: textfield;
        font-size: 14px;
        border: none;
        background-color: #f2f4f5;
        text-align: center; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .single_product_desc .cart .quantity .qty-text {
            width: 70px; } }
      .single_product_desc .cart .quantity .qty-minus,
      .single_product_desc .cart .quantity .qty-plus {
        display: block;
        height: 100%;
        position: absolute;
        left: 10px;
        text-align: center;
        top: 0;
        width: 30px;
        z-index: 99;
        cursor: pointer;
        font-size: 8px;
        line-height: 46px;
        color: #303030; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .single_product_desc .cart .quantity .qty-minus,
          .single_product_desc .cart .quantity .qty-plus {
            left: 0; } }
      .single_product_desc .cart .quantity .qty-plus {
        left: auto;
        right: 10px; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .single_product_desc .cart .quantity .qty-plus {
            right: 0; } }
  .single_product_desc .wishlist-compare {
    position: relative;
    z-index: 1; }
    @media only screen and (max-width: 767px) {
      .single_product_desc .wishlist-compare {
        margin-top: 30px; } }
    @media only screen and (min-width: 480px) and (max-width: 767px) {
      .single_product_desc .wishlist-compare {
        margin-top: 0; } }
    .single_product_desc .wishlist-compare a {
      background-color: #f2f4f5;
      display: inline-block;
      width: 46px;
      height: 46px;
      text-align: center;
      line-height: 46px;
      font-size: 18px; }
  .single_product_desc .products--meta {
    position: relative;
    z-index: 1;
    padding-top: 50px; }
    .single_product_desc .products--meta p {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex; }
      .single_product_desc .products--meta p span:first-child {
        font-weight: 500;
        color: #303030;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 150px;
        flex: 0 0 150px;
        max-width: 150px;
        width: 150px; }
      .single_product_desc .products--meta p span:last-child {
        font-weight: 400;
        color: #707070; }
        .single_product_desc .products--meta p span:last-child a {
          color: #cccccc;
          font-size: 14px;
          margin-right: 15px; }
          .single_product_desc .products--meta p span:last-child a:hover {
            color: #70c745; }

.product_details_tab {
  position: relative;
  z-index: 1;
  padding: 50px 0;
  border-top: 1px solid #ebebeb;
  border-bottom: 1px solid #ebebeb; }
  .product_details_tab .nav-tabs {
    border-bottom: none;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: 30px; }
    .product_details_tab .nav-tabs .nav-link {
      border: none;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      padding: 0 15px;
      font-size: 20px;
      color: #303030; }
      .product_details_tab .nav-tabs .nav-link.active, .product_details_tab .nav-tabs .nav-link:hover {
        color: #70c745; }
  .product_details_tab .additional_info_area p {
    color: #303030; }
    .product_details_tab .additional_info_area p span {
      color: #707070; }

.product_details_tab .review-rating i {
  color: #ff9800;
  font-size: 14px; }

.product_details_tab .review-rating > span {
  font-size: 16px;
  font-weight: 500;
  color: #303030; }

.submit_a_review_area form .stars {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAABaCAYAAACv+ebYAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDcvMDMvMTNJ3Rb7AAACnklEQVRoge2XwW3bMBSGPxa9NxtIGzTAW8DdRL7o3A0qb+BrdNIm9QAm0G7gbJBMwB5MoVJNUSRFIXGqHwhkmXr68hOPNH9ljOEt9OlNqBs4RlrrSmtdpdZ/Ti0EGnvtUoqTHFunBVCkuk6d6mbi83rggdteSa5THDeB3+UDO9z2inatXFum1roESuAReAB29vp15n2/gRfgZK+/gIuIXLxgrfUO+Bnzn0fom4ic+pvRVNuB/QrQ/RB6A7bwLjN8b985krO5MsKd0ElwJvgk1AteCPdCYWI5/SutddQxRUTU3DOzG4hd01EKqQnZuaLBITUh4F0CeLYm5CDw6PjuFTjaz9+BLwE1I8VO9StwAEoRaUSkseMHO+aqcWq2qwcdfQCOIvIy8dwDV/c/YL6zvWDbnQ3QuH5hltQEreM1dH/n6g28gT8eWLVUqqVKrb+vtGidFkCR6vp+0uLAba8k1/eRFh1ue0W7dv4sqpaSjGnR1Fy8YNWyY8W0aGpO/c1oqu3AKmlxCL0BW3iXGb637xzJ2VwZ4U7oJDgTfBLqBS+Ee6EQeMpULVFHUVOzPC3aNR2lkJotLbr0vtKiqWlMTcNaaXHQ0QfgaGqcaVG1jNLibGcbYyb/eDIlT6bjyZS+51JqtrS4gTfw/wzWqkKrKrU8fQPR6gKAmDKlPM3x1WkBFKmu0xxf3fZR5jnFdbzjv257JbmOdzx22yvadZzjW7e9ol27HWtVkjEtIubiB2u1Y8W0iJhTfzOe6uvAKmlxCL0FX+FdZvjevnMkd3Plgzuh0+A88EmoH7wM7oVC6AaiVdwuI2Z5WrRrOk4BNVtadOl9pUXENIhpWCstDjr6ABwR40yLaDVKi7Od7U1/Z0pzpjNngtNiaM2WFj8++A+motm0NTqjmwAAAABJRU5ErkJggg==") repeat-x 0 0;
  width: 150px; }
  .submit_a_review_area form .stars::after, .submit_a_review_area form .stars::before {
    display: table;
    content: ""; }
  .submit_a_review_area form .stars::after {
    clear: both; }
  .submit_a_review_area form .stars input[type="radio"] {
    position: absolute;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0); }
    .submit_a_review_area form .stars input[type="radio"].star-5:checked ~ span {
      width: 100%; }
    .submit_a_review_area form .stars input[type="radio"].star-4:checked ~ span {
      width: 80%; }
    .submit_a_review_area form .stars input[type="radio"].star-3:checked ~ span {
      width: 60%; }
    .submit_a_review_area form .stars input[type="radio"].star-2:checked ~ span {
      width: 40%; }
    .submit_a_review_area form .stars input[type="radio"].star-1:checked ~ span {
      width: 20%; }
  .submit_a_review_area form .stars label {
    display: block;
    width: 30px;
    height: 30px;
    margin: 0 !important;
    padding: 0 !important;
    text-indent: -999em;
    float: left;
    position: relative;
    z-index: 10;
    background: transparent !important;
    cursor: pointer; }
    .submit_a_review_area form .stars label:hover ~ span {
      background-position: 0 -30px; }
    .submit_a_review_area form .stars label.star-5:hover ~ span {
      width: 100% !important; }
    .submit_a_review_area form .stars label.star-4:hover ~ span {
      width: 80% !important; }
    .submit_a_review_area form .stars label.star-3:hover ~ span {
      width: 60% !important; }
    .submit_a_review_area form .stars label.star-2:hover ~ span {
      width: 40% !important; }
    .submit_a_review_area form .stars label.star-1:hover ~ span {
      width: 20% !important; }
  .submit_a_review_area form .stars span {
    display: block;
    width: 0;
    position: relative;
    top: 0;
    left: 0;
    height: 30px;
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAABaCAYAAACv+ebYAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDcvMDMvMTNJ3Rb7AAACnklEQVRoge2XwW3bMBSGPxa9NxtIGzTAW8DdRL7o3A0qb+BrdNIm9QAm0G7gbJBMwB5MoVJNUSRFIXGqHwhkmXr68hOPNH9ljOEt9OlNqBs4RlrrSmtdpdZ/Ti0EGnvtUoqTHFunBVCkuk6d6mbi83rggdteSa5THDeB3+UDO9z2inatXFum1roESuAReAB29vp15n2/gRfgZK+/gIuIXLxgrfUO+Bnzn0fom4ic+pvRVNuB/QrQ/RB6A7bwLjN8b985krO5MsKd0ElwJvgk1AteCPdCYWI5/SutddQxRUTU3DOzG4hd01EKqQnZuaLBITUh4F0CeLYm5CDw6PjuFTjaz9+BLwE1I8VO9StwAEoRaUSkseMHO+aqcWq2qwcdfQCOIvIy8dwDV/c/YL6zvWDbnQ3QuH5hltQEreM1dH/n6g28gT8eWLVUqqVKrb+vtGidFkCR6vp+0uLAba8k1/eRFh1ue0W7dv4sqpaSjGnR1Fy8YNWyY8W0aGpO/c1oqu3AKmlxCL0BW3iXGb637xzJ2VwZ4U7oJDgTfBLqBS+Ee6EQeMpULVFHUVOzPC3aNR2lkJotLbr0vtKiqWlMTcNaaXHQ0QfgaGqcaVG1jNLibGcbYyb/eDIlT6bjyZS+51JqtrS4gTfw/wzWqkKrKrU8fQPR6gKAmDKlPM3x1WkBFKmu0xxf3fZR5jnFdbzjv257JbmOdzx22yvadZzjW7e9ol27HWtVkjEtIubiB2u1Y8W0iJhTfzOe6uvAKmlxCL0FX+FdZvjevnMkd3Plgzuh0+A88EmoH7wM7oVC6AaiVdwuI2Z5WrRrOk4BNVtadOl9pUXENIhpWCstDjr6ABwR40yLaDVKi7Od7U1/Z0pzpjNngtNiaM2WFj8++A+motm0NTqjmwAAAABJRU5ErkJggg==") repeat-x 0 -60px;
    -webkit-transition: -webkit-width 0.5s;
    -webkit-transition: width 0.5s;
    transition: width 0.5s; }

.review-details p {
  font-size: 12px; }

.submit_a_review_area h4 {
  font-size: 20px; }
.submit_a_review_area .form-group > label {
  font-size: 14px; }
.submit_a_review_area input,
.submit_a_review_area select {
  font-size: 14px;
  width: 100%;
  height: 40px;
  border: none;
  background-color: #f2f4f5;
  border-radius: 0; }
.submit_a_review_area textarea {
  width: 100%;
  height: 100px;
  border: none;
  border-radius: 0;
  background-color: #f2f4f5; }

/* :: 9.0 Cart Area CSS */
.cart-table {
  position: relative;
  z-index: 1; }
  .cart-table thead tr,
  .cart-table thead th {
    width: 20%; }
  .cart-table thead th {
    border: none;
    border-bottom: none;
    font-size: 20px;
    padding: 0 0 30px 0;
    color: #303030;
    font-weight: 500;
    text-transform: uppercase;
    text-align: left; }
    .cart-table thead th:first-child {
      width: 40%; }
  .cart-table tbody tr {
    position: relative;
    z-index: 1;
    border-bottom: 1px solid #ebebeb; }
    .cart-table tbody tr td {
      position: relative;
      z-index: 1;
      padding: 30px 15px;
      font-size: 18px;
      font-weight: 600;
      color: #303030;
      vertical-align: middle; }
      .cart-table tbody tr td.cart_product_img {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -ms-grid-row-align: center;
        align-items: center; }
        .cart-table tbody tr td.cart_product_img a {
          -webkit-box-flex: 0;
          -ms-flex: 0 0 100px;
          flex: 0 0 100px;
          max-width: 100px;
          width: 100px;
          display: inline-block;
          margin-right: 20px;
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
          margin-left: 2px; }
        .cart-table tbody tr td.cart_product_img h5 {
          font-size: 18px;
          margin-bottom: 0; }
      .cart-table tbody tr td i {
        font-size: 36px;
        color: #c42525; }
  .cart-table .quantity {
    position: relative;
    z-index: 1;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100px;
    flex: 0 0 100px;
    max-width: 100px;
    width: 100px; }
    .cart-table .quantity .qty-text {
      height: 46px;
      padding: 5px 15px;
      width: 100px;
      -moz-appearance: textfield;
      -webkit-appearance: textfield;
      appearance: textfield;
      font-size: 14px;
      border: none;
      background-color: #f2f4f5;
      text-align: center; }
    .cart-table .quantity .qty-minus,
    .cart-table .quantity .qty-plus {
      display: block;
      height: 100%;
      position: absolute;
      left: 10px;
      text-align: center;
      top: 0;
      width: 30px;
      z-index: 99;
      cursor: pointer;
      font-size: 8px;
      line-height: 46px;
      color: #303030; }
      .cart-table .quantity .qty-minus i,
      .cart-table .quantity .qty-plus i {
        font-size: 10px;
        color: #303030; }
    .cart-table .quantity .qty-plus {
      left: auto;
      right: 10px; }

.coupon-discount {
  position: relative;
  z-index: 1; }
  .coupon-discount form {
    position: relative;
    z-index: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -ms-grid-row-align: center;
    align-items: center; }
    .coupon-discount form input {
      width: 300px;
      height: 46px;
      border: 1px solid #ebebeb;
      background-color: #f5f5f5;
      padding: 0 30px;
      font-size: 14px;
      margin-right: 30px; }
      @media only screen and (max-width: 767px) {
        .coupon-discount form input {
          width: 150px;
          padding: 0 10px;
          font-size: 13px;
          margin-right: 15px; } }
    .coupon-discount form button {
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms;
      width: 170px;
      height: 46px;
      border: 1px solid #ebebeb;
      background-color: #cccccc;
      color: #303030;
      font-size: 16px;
      text-transform: uppercase;
      cursor: pointer;
      font-weight: 500; }
      .coupon-discount form button:hover, .coupon-discount form button:focus {
        background-color: #70c745;
        color: #ffffff;
        border-color: #70c745; }

.cart-totals-area {
  position: relative;
  z-index: 1; }
  .cart-totals-area .title-- {
    padding-bottom: 20px;
    text-transform: uppercase;
    border-bottom: 1px solid #ebebeb;
    margin-bottom: 0; }
  .cart-totals-area .subtotal,
  .cart-totals-area .total {
    padding: 20px 0;
    border-bottom: 1px solid #ebebeb; }
    .cart-totals-area .subtotal h5,
    .cart-totals-area .total h5 {
      font-size: 18px;
      color: #303030;
      margin-bottom: 0; }
      .cart-totals-area .subtotal h5:last-child,
      .cart-totals-area .total h5:last-child {
        font-weight: 600; }
  .cart-totals-area .shipping {
    padding: 20px 0;
    border-bottom: 1px solid #ebebeb; }
    .cart-totals-area .shipping h5 {
      font-size: 18px;
      color: #303030;
      margin-bottom: 0;
      margin-right: 50px; }
    .cart-totals-area .shipping .shipping-address select,
    .cart-totals-area .shipping .shipping-address input,
    .cart-totals-area .shipping .shipping-address input,
    .cart-totals-area .shipping .shipping-address button {
      width: 100%;
      height: 30px;
      font-size: 10px;
      padding: 0 10px;
      background-color: #f5f5f5;
      border: 1px solid #ebebeb;
      margin-bottom: 15px; }
    .cart-totals-area .shipping .shipping-address button {
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms;
      width: 100%;
      height: 30px;
      border: 1px solid #ebebeb;
      background-color: #cccccc;
      color: #303030;
      font-size: 14px;
      text-transform: uppercase;
      cursor: pointer;
      font-weight: 500;
      margin-bottom: 0; }
      .cart-totals-area .shipping .shipping-address button:hover, .cart-totals-area .shipping .shipping-address button:focus {
        background-color: #70c745;
        color: #ffffff;
        border-color: #70c745; }

/* :: 10.0 Checkout Area CSS */
.checkout_area {
  position: relative;
  z-index: 1;
  overflow-x: hidden; }

.checkout_details_area {
  position: relative;
  z-index: 1; }
  .checkout_details_area h5 {
    margin-bottom: 20px;
    text-transform: uppercase; }
  .checkout_details_area input,
  .checkout_details_area select,
  .checkout_details_area textarea {
    width: 100%;
    height: 46px;
    border: 1px solid #ebebeb;
    background-color: #f5f5f5;
    font-size: 14px; }
    .checkout_details_area input:focus,
    .checkout_details_area select:focus,
    .checkout_details_area textarea:focus {
      box-shadow: none;
      border: 1px solid #70c745; }
  .checkout_details_area textarea {
    height: 100px; }
  .checkout_details_area .custom-control-label {
    font-size: 14px; }

.checkout-content {
  position: relative;
  z-index: 1; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .checkout-content {
      margin-top: 100px; } }
  @media only screen and (max-width: 767px) {
    .checkout-content {
      margin-top: 100px; } }
  .checkout-content .title-- {
    padding-bottom: 20px;
    text-transform: uppercase;
    border-bottom: 1px solid #ebebeb;
    margin-bottom: 0; }
  .checkout-content .subtotal,
  .checkout-content .shipping,
  .checkout-content .products,
  .checkout-content .order-total {
    padding: 20px 0;
    border-bottom: 1px solid #ebebeb; }
    .checkout-content .subtotal h5,
    .checkout-content .shipping h5,
    .checkout-content .products h5,
    .checkout-content .order-total h5 {
      font-size: 18px;
      color: #303030;
      margin-bottom: 0; }
      .checkout-content .subtotal h5:last-child,
      .checkout-content .shipping h5:last-child,
      .checkout-content .products h5:last-child,
      .checkout-content .order-total h5:last-child {
        font-weight: 600; }
  .checkout-content .single-products p {
    line-height: 1.3;
    margin-bottom: 0; }
  .checkout-content .single-products h5 {
    line-height: 1.3;
    margin-bottom: 0; }

/* :: 11.0 Testimonial Area CSS */
.testimonials-slides {
  position: relative;
  z-index: 1; }
  .testimonials-slides .owl-dots {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-top: 30px;
    position: relative;
    z-index: 1;
    width: 50%; }
    @media only screen and (max-width: 767px) {
      .testimonials-slides .owl-dots {
        width: 100%; } }
    .testimonials-slides .owl-dots .owl-dot {
      position: relative;
      z-index: 1;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 12px;
      flex: 0 0 12px;
      max-width: 12px;
      width: 12px;
      border: 2px solid #b6b7b7;
      height: 12px;
      margin: 0 6px;
      border-radius: 50%; }
      .testimonials-slides .owl-dots .owl-dot::after {
        width: 4px;
        height: 4px;
        background-color: #70c745;
        border-radius: 50%;
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        z-index: 10;
        opacity: 0;
        visibility: hidden; }
      .testimonials-slides .owl-dots .owl-dot.active {
        border-color: #70c745; }
        .testimonials-slides .owl-dots .owl-dot.active::after {
          opacity: 1;
          visibility: visible; }

.single-testimonial-slide {
  position: relative;
  z-index: 1; }
  .single-testimonial-slide .testimonial-thumb {
    width: 300px;
    height: 300px;
    margin: auto;
    border-radius: 50%;
    box-shadow: 0 1px 20px 0 rgba(0, 0, 0, 0.15); }
    .single-testimonial-slide .testimonial-thumb img {
      border-radius: 50%; }
    @media only screen and (max-width: 767px) {
      .single-testimonial-slide .testimonial-thumb {
        width: 250px;
        height: 250px;
        margin-bottom: 50px; } }
  .single-testimonial-slide .testimonial-content .testimonial-author-info h6 {
    font-size: 18px;
    margin-bottom: 0; }
  .single-testimonial-slide .testimonial-content .testimonial-author-info p {
    margin-bottom: 0;
    color: #70c745; }

/* :: 12.0 About Us Area CSS */
.about-us-area {
  position: relative;
  z-index: 1; }
  .about-us-area .border-line {
    width: 100%;
    height: 1px;
    background-color: #ebebeb;
    margin-top: 50px; }

.alazea-progress-bar {
  position: relative;
  z-index: 1;
  margin-top: 40px; }
  .alazea-progress-bar .single_progress_bar {
    position: relative;
    z-index: 1;
    margin-bottom: 30px; }
    .alazea-progress-bar .single_progress_bar:last-child {
      margin-bottom: 0; }
    .alazea-progress-bar .single_progress_bar p {
      font-weight: 500;
      line-height: 1;
      font-size: 18px;
      color: #303030;
      margin-bottom: 10px; }

.barfiller {
  background-color: #ebebeb;
  border: none;
  border-radius: 0;
  box-shadow: none;
  height: 10px;
  margin-bottom: 5px;
  position: relative;
  width: 100%; }
  .barfiller .fill {
    display: block;
    position: relative;
    width: 0px;
    height: 100%;
    background: #70c745;
    z-index: 1; }
  .barfiller .tipWrap {
    display: none; }
  .barfiller .tip {
    margin-top: -35px;
    padding: 2px 4px;
    font-size: 18px;
    color: #303030;
    left: 0;
    position: absolute;
    z-index: 2;
    background: transparent;
    font-weight: 500; }
    .barfiller .tip::after {
      display: none; }

.single-benefits-area {
  position: relative;
  z-index: 1;
  margin-bottom: 50px; }
  .single-benefits-area img {
    margin-bottom: 30px; }
  .single-benefits-area p {
    margin-bottom: 0; }

/* :: 13.0 Service Area CSS */
.single-service-area {
  position: relative;
  z-index: 1;
  margin-bottom: 50px; }
  .single-service-area:last-child {
    margin-bottom: 0; }
  .single-service-area .service-icon {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 45px;
    flex: 0 0 45px;
    max-width: 45px;
    width: 45px; }
  .single-service-area .service-content p {
    margin-bottom: 0; }

.alazea-video-area {
  position: relative;
  z-index: 1;
  border-radius: 6px;
  box-shadow: 0 1px 20px 0 rgba(0, 0, 0, 0.15); }
  .alazea-video-area.bg-overlay:after {
    border-radius: 6px; }
  .alazea-video-area img {
    position: relative;
    z-index: -21;
    border-radius: 6px; }
  .alazea-video-area .video-icon {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    width: 70px;
    height: 70px;
    background-color: #70c745;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -35px;
    margin-left: -35px;
    z-index: 100;
    border-radius: 50%;
    line-height: 72px;
    text-align: center;
    cursor: pointer;
    opacity: 0.9; }
    .alazea-video-area .video-icon i {
      color: #ffffff;
      font-size: 24px; }
    .alazea-video-area .video-icon:hover {
      opacity: 1;
      box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.15); }

/* :: 14.0 Team Member Area CSS */
.single-team-member {
  position: relative;
  z-index: 1; }
  .single-team-member .team-member-thumb {
    position: relative;
    z-index: 1; }
    .single-team-member .team-member-thumb img {
      width: 100%; }
    .single-team-member .team-member-thumb .team-member-social-info {
      position: absolute;
      width: 100%;
      height: 60px;
      background-color: rgba(48, 48, 48, 0.7);
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 10;
      opacity: 0;
      visibility: hidden;
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms; }
      .single-team-member .team-member-thumb .team-member-social-info a {
        color: #ffffff;
        line-height: 60px;
        margin: 0 15px; }
        .single-team-member .team-member-thumb .team-member-social-info a:hover {
          color: #70c745; }
  .single-team-member .team-member-info h5 {
    margin-bottom: 4px; }
  .single-team-member .team-member-info p {
    margin-bottom: 0; }
  .single-team-member:hover .team-member-thumb .team-member-social-info {
    opacity: 1;
    visibility: visible; }

/* :: 15.0 Portfolio Area CSS */
.alazea-portfolio-filter {
  position: relative;
  z-index: 1;
  text-align: center;
  margin-bottom: 30px; }
  .alazea-portfolio-filter .btn {
    -webkit-transition-duration: 300ms;
    transition-duration: 300ms;
    padding: 0;
    font-size: 20px;
    color: #707070;
    font-weight: 500;
    background-color: transparent;
    padding: 0 20px; }
    @media only screen and (max-width: 767px) {
      .alazea-portfolio-filter .btn {
        font-size: 16px;
        padding: 0 5px; } }
    .alazea-portfolio-filter .btn:hover, .alazea-portfolio-filter .btn:focus {
      color: #70c745;
      box-shadow: none; }

.alazea-portfolio.row {
  margin-right: -10px;
  margin-left: -10px; }
.alazea-portfolio .col-12 {
  padding-left: 10px;
  padding-right: 10px; }

.single_portfolio_item {
  position: relative;
  z-index: 10;
  margin-top: 20px;
  overflow: hidden;
  height: 400px;
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms; }
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    .single_portfolio_item {
      height: 290px; } }
  @media only screen and (max-width: 767px) {
    .single_portfolio_item {
      height: 300px; } }
  .single_portfolio_item .portfolio-thumbnail {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    width: calc(100% - 20px);
    position: absolute;
    height: 100%;
    top: 0;
    left: 10px;
    right: 10px;
    background-repeat: no-repeat; }
  .single_portfolio_item .portfolio-hover-overlay {
    width: calc(100% - 20px);
    height: 100%;
    top: 0;
    left: 10px;
    right: 10px;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    background-color: rgba(112, 199, 69, 0.8);
    position: absolute;
    z-index: 10;
    text-align: center;
    opacity: 0;
    visibility: hidden; }
    .single_portfolio_item .portfolio-hover-overlay a {
      position: relative;
      width: 100%;
      height: 100%;
      z-index: 30; }
      .single_portfolio_item .portfolio-hover-overlay a .port-hover-text h3 {
        font-size: 28px;
        color: #ffffff; }
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
          .single_portfolio_item .portfolio-hover-overlay a .port-hover-text h3 {
            font-size: 20px; } }
        @media only screen and (max-width: 767px) {
          .single_portfolio_item .portfolio-hover-overlay a .port-hover-text h3 {
            font-size: 18px; } }
      .single_portfolio_item .portfolio-hover-overlay a .port-hover-text h5 {
        font-size: 18px;
        margin-bottom: 0;
        color: #ffffff;
        font-weight: 400; }
        @media only screen and (max-width: 767px) {
          .single_portfolio_item .portfolio-hover-overlay a .port-hover-text h5 {
            font-size: 14px; } }
  .single_portfolio_item:hover {
    -webkit-transform: translateY(-15px);
    transform: translateY(-15px); }
    .single_portfolio_item:hover .portfolio-hover-overlay {
      opacity: 1;
      visibility: visible; }

.portfolio-page .single_portfolio_item {
  height: 320px; }

.mfp-image-holder .mfp-close,
.mfp-iframe-holder .mfp-close {
  color: #ffffff;
  right: 0;
  text-align: center;
  padding-right: 0;
  top: 40px;
  width: 36px;
  height: 36px;
  background-color: #70c745;
  line-height: 36px; }

.mfp-bottom-bar {
  margin-top: 0;
  top: auto;
  bottom: 55px;
  left: 0;
  width: 100%;
  cursor: auto;
  background-color: transparent;
  padding: 0 15px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -ms-grid-row-align: center;
  align-items: center; }
  .mfp-bottom-bar .mfp-title {
    line-height: normal;
    color: #ffffff;
    padding-right: 0;
    background-color: #70c745;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700; }
  .mfp-bottom-bar .mfp-counter {
    color: #ffffff;
    position: relative;
    line-height: normal;
    background-color: #70c745;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700; }

/* :: 16.0 Cool Facts Area CSS */
.cool-facts-area {
  position: relative;
  z-index: 1;
  background-size: cover;
  background-position: top left; }
  @media only screen and (max-width: 767px) {
    .cool-facts-area::after {
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background-color: #f2f4f5;
      content: '';
      position: absolute;
      z-index: -1; } }
  .cool-facts-area .side-img {
    position: absolute;
    bottom: -80px;
    right: 10%;
    z-index: 10;
    width: 150px; }

.single-cool-fact {
  position: relative;
  z-index: 1; }
  .single-cool-fact .cf-icon {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50px;
    flex: 0 0 50px;
    max-width: 50px;
    width: 50px;
    margin-right: 30px; }
  .single-cool-fact .cf-content h2 {
    font-size: 36px;
    margin-bottom: 10px;
    line-height: 1; }
  .single-cool-fact .cf-content h6 {
    font-weight: 400;
    color: #707070;
    margin-bottom: 0;
    text-transform: uppercase; }

/* :: 17.0 Footer Area CSS */
.footer-area {
  position: relative;
  z-index: 1; }
  .footer-area::after {
    background-color: rgba(4, 43, 15, 0.8);
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: ""; }
  .footer-area .main-footer-area {
    position: relative;
    z-index: 1;
    padding-top: 80px; }
  .footer-area .single-footer-widget {
    position: relative;
    z-index: 1;
    margin-bottom: 70px; }
    .footer-area .single-footer-widget p {
      color: #b7b7b7;
      margin-bottom: 20px; }
    .footer-area .single-footer-widget .social-info a {
      display: inline-block;
      border: 1px solid #b7b7b7;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      text-align: center;
      color: #ffffff;
      margin-right: 5px;
      line-height: 38px; }
      @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .footer-area .single-footer-widget .social-info a {
          width: 30px;
          height: 30px;
          line-height: 28px;
          font-size: 14px; } }
      .footer-area .single-footer-widget .social-info a:hover, .footer-area .single-footer-widget .social-info a:focus {
        border-color: #70c745;
        background-color: #70c745; }
    .footer-area .single-footer-widget .widget-title h5 {
      font-size: 22px;
      color: #ffffff;
      text-transform: uppercase;
      margin-bottom: 30px; }
    .footer-area .single-footer-widget .widget-nav ul {
      position: relative;
      z-index: 1;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap; }
      .footer-area .single-footer-widget .widget-nav ul li {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
        width: 50%; }
        .footer-area .single-footer-widget .widget-nav ul li a {
          display: block;
          color: #b7b7b7;
          font-size: 16px;
          font-weight: 400;
          margin-bottom: 11px; }
          .footer-area .single-footer-widget .widget-nav ul li a:hover, .footer-area .single-footer-widget .widget-nav ul li a:focus {
            color: #ffffff; }
    .footer-area .single-footer-widget .single-best-seller-product {
      position: relative;
      z-index: 1;
      margin-bottom: 20px; }
      .footer-area .single-footer-widget .single-best-seller-product::after {
        margin-bottom: 0; }
      .footer-area .single-footer-widget .single-best-seller-product .product-thumbnail {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 70px;
        flex: 0 0 70px;
        max-width: 70px;
        width: 70px;
        margin-right: 30px; }
      .footer-area .single-footer-widget .single-best-seller-product .product-info a {
        display: block;
        color: #b7b7b7;
        font-size: 16px;
        font-weight: 400; }
        .footer-area .single-footer-widget .single-best-seller-product .product-info a:hover, .footer-area .single-footer-widget .single-best-seller-product .product-info a:focus {
          color: #ffffff; }
      .footer-area .single-footer-widget .single-best-seller-product .product-info p {
        margin-bottom: 0;
        color: #ffffff;
        font-weight: 500; }
    .footer-area .single-footer-widget .contact-information p {
      line-height: 1.3;
      color: #ffffff;
      margin-bottom: 13px; }
      .footer-area .single-footer-widget .contact-information p span {
        color: #b7b7b7; }
      .footer-area .single-footer-widget .contact-information p:last-child {
        margin-bottom: 0; }
  .footer-area .footer-bottom-area {
    position: relative;
    z-index: 1; }
    .footer-area .footer-bottom-area .border-line {
      width: 100%;
      height: 1px;
      background-color: #34513d; }
    .footer-area .footer-bottom-area .copywrite-text {
      position: relative;
      z-index: 1;
      padding: 20px 0; }
      @media only screen and (max-width: 767px) {
        .footer-area .footer-bottom-area .copywrite-text {
          text-align: center;
          padding-bottom: 0; } }
      .footer-area .footer-bottom-area .copywrite-text p {
        font-size: 14px;
        color: #b7b7b7;
        font-weight: 400;
        margin-bottom: 0; }
        @media only screen and (max-width: 767px) {
          .footer-area .footer-bottom-area .copywrite-text p {
            font-size: 12px; } }
        .footer-area .footer-bottom-area .copywrite-text p a {
          font-size: 14px;
          color: #ffffff;
          font-weight: 500; }
          .footer-area .footer-bottom-area .copywrite-text p a:hover, .footer-area .footer-bottom-area .copywrite-text p a:focus {
            color: #70c745; }
          @media only screen and (max-width: 767px) {
            .footer-area .footer-bottom-area .copywrite-text p a {
              font-size: 12px; } }
    .footer-area .footer-bottom-area .footer-nav {
      position: relative;
      z-index: 1;
      padding: 20px 0; }
      .footer-area .footer-bottom-area .footer-nav ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end; }
        @media only screen and (max-width: 767px) {
          .footer-area .footer-bottom-area .footer-nav ul {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center; } }
        .footer-area .footer-bottom-area .footer-nav ul li a {
          display: inline-block;
          color: #b7b7b7;
          font-size: 14px;
          font-weight: 400;
          margin: 0 15px; }
          @media only screen and (min-width: 768px) and (max-width: 991px) {
            .footer-area .footer-bottom-area .footer-nav ul li a {
              margin: 0 8px; } }
          @media only screen and (max-width: 767px) {
            .footer-area .footer-bottom-area .footer-nav ul li a {
              margin: 0 5px; } }
          .footer-area .footer-bottom-area .footer-nav ul li a:hover, .footer-area .footer-bottom-area .footer-nav ul li a:focus {
            color: #ffffff; }
        .footer-area .footer-bottom-area .footer-nav ul li:last-child a {
          margin-right: 0; }

/* :: 18.0 Breadcumb Area CSS */
.breadcrumb-area {
  position: relative;
  z-index: 10;
  width: 100%; }
  .breadcrumb-area .top-breadcrumb-area {
    position: relative;
    z-index: 1;
    width: 100%;
    height: 350px; }
    @media only screen and (max-width: 767px) {
      .breadcrumb-area .top-breadcrumb-area {
        height: 220px; } }
    .breadcrumb-area .top-breadcrumb-area h2 {
      margin-top: 132px;
      font-size: 36px;
      color: #ffffff;
      margin-bottom: 0;
      line-height: 1;
      text-transform: uppercase; }
      @media only screen and (max-width: 767px) {
        .breadcrumb-area .top-breadcrumb-area h2 {
          margin-top: 112px;
          font-size: 30px; } }
  .breadcrumb-area .breadcrumb {
    margin: 0;
    padding-top: 30px;
    padding-bottom: 50px;
    padding-left: 0;
    padding-right: 0;
    background-color: transparent; }
    .breadcrumb-area .breadcrumb .breadcrumb-item {
      font-size: 16px;
      color: #b7b7b7;
      text-transform: capitalize; }
      .breadcrumb-area .breadcrumb .breadcrumb-item a {
        text-transform: capitalize;
        font-size: 16px;
        color: #303030; }
        .breadcrumb-area .breadcrumb .breadcrumb-item a:hover, .breadcrumb-area .breadcrumb .breadcrumb-item a:focus {
          color: #70c745; }
    .breadcrumb-area .breadcrumb .breadcrumb-item + .breadcrumb-item::before {
      color: #303030;
      content: ">"; }

/* :: 19.0 Blog Area CSS */
.single-blog-post {
  position: relative;
  z-index: 1;
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms; }
  .single-blog-post .post-thumbnail {
    position: relative;
    z-index: 1; }
  .single-blog-post .post-content .post-title h5 {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    line-height: 1.5;
    margin-bottom: 15px; }
    .single-blog-post .post-content .post-title h5:hover {
      color: #70c745; }
  .single-blog-post .post-content .post-meta {
    position: relative;
    z-index: 1;
    margin-bottom: 10px; }
    .single-blog-post .post-content .post-meta a {
      position: relative;
      z-index: 1;
      display: inline-block;
      font-size: 14px;
      color: #b7b7b7;
      margin-right: 30px; }
      .single-blog-post .post-content .post-meta a:last-child::after {
        content: '/';
        top: 0;
        left: -20px;
        position: absolute;
        z-index: 1; }
      .single-blog-post .post-content .post-meta a i {
        margin-right: 5px;
        color: #70c745; }
      .single-blog-post .post-content .post-meta a:hover {
        color: #70c745; }
  .single-blog-post .post-content .post-excerpt {
    font-size: 16px;
    color: #707070;
    margin-bottom: 0; }
  .single-blog-post:hover .post-content .post-title h5 {
    color: #70c745; }

.pagination {
  position: relative;
  z-index: 1;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center; }
  .pagination .page-item .page-link {
    color: #707070;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    text-align: center;
    font-size: 18px;
    line-height: 44px;
    padding: 0;
    margin: 0 10px; }
    .pagination .page-item .page-link:hover, .pagination .page-item .page-link:focus {
      border-color: #70c745;
      background-color: #70c745;
      color: #ffffff; }

.shop-products-area .pagination {
  position: relative;
  z-index: 1;
  -webkit-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end; }
  .shop-products-area .pagination .page-item .page-link {
    color: #707070;
    width: 46px;
    height: 46px;
    border-radius: 0;
    text-align: center;
    border: 1px solid #ebebeb;
    font-size: 18px;
    line-height: 44px;
    padding: 0;
    margin: 0 10px;
    background-color: #f5f5f5; }
    .shop-products-area .pagination .page-item .page-link:hover, .shop-products-area .pagination .page-item .page-link:focus {
      border-color: #70c745;
      background-color: #70c745;
      color: #ffffff; }

/* :: 20.0 Comment Area */
.comment_area {
  position: relative;
  z-index: 1;
  padding: 50px 0 20px 0;
  border-top: 1px solid #ebebeb; }
  .comment_area .headline {
    margin-bottom: 30px; }
  .comment_area .single_comment_area {
    position: relative;
    z-index: 1; }
    .comment_area .single_comment_area::after {
      position: absolute;
      width: 1px;
      height: 90%;
      background-color: #ebebeb;
      left: 100px;
      top: 0;
      z-index: 2;
      content: ''; }
      @media only screen and (max-width: 767px) {
        .comment_area .single_comment_area::after {
          display: none; } }
    .comment_area .single_comment_area .comment-wrapper {
      margin-bottom: 30px; }
      .comment_area .single_comment_area .comment-wrapper .comment-author {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin-right: 60px; }
        @media only screen and (max-width: 767px) {
          .comment_area .single_comment_area .comment-wrapper .comment-author {
            margin-right: 20px; } }
        .comment_area .single_comment_area .comment-wrapper .comment-author img {
          width: 100%;
          height: 100%;
          border-radius: 50%; }
      .comment_area .single_comment_area .comment-wrapper .comment-content {
        -webkit-box-flex: 0;
        -ms-flex: 1;
        flex: 1; }
        .comment_area .single_comment_area .comment-wrapper .comment-content .comment-date {
          font-size: 12px;
          text-transform: uppercase;
          letter-spacing: 1px;
          color: #70c745; }
        .comment_area .single_comment_area .comment-wrapper .comment-content h5 {
          font-size: 20px;
          margin: 0 0 10px 0; }
        .comment_area .single_comment_area .comment-wrapper .comment-content p {
          font-size: 16px;
          margin-bottom: 5px; }
        .comment_area .single_comment_area .comment-wrapper .comment-content .comment-date {
          color: #b7b7b7;
          font-size: 14px;
          margin-bottom: 10px; }
        .comment_area .single_comment_area .comment-wrapper .comment-content a {
          font-size: 14px;
          color: #303030;
          display: inline-block;
          text-transform: uppercase;
          letter-spacing: 1px; }
          .comment_area .single_comment_area .comment-wrapper .comment-content a:hover {
            color: #70c745; }

.single_comment_area ol li.single_comment_area {
  margin-left: 130px; }
  .single_comment_area ol li.single_comment_area::after {
    display: none; }
  @media only screen and (max-width: 767px) {
    .single_comment_area ol li.single_comment_area {
      margin-left: 40px; } }
  .single_comment_area ol li.single_comment_area .comment-wrapper .comment-author {
    margin-right: 30px; }
    @media only screen and (max-width: 767px) {
      .single_comment_area ol li.single_comment_area .comment-wrapper .comment-author {
        margin-right: 15px; } }

/* :: 21.0 Leave A Reply Area CSS */
.leave-comment-area {
  position: relative;
  z-index: 1;
  border-top: 1px solid #ebebeb;
  padding: 50px 0 0 0; }
  .leave-comment-area h4 {
    margin-bottom: 30px; }
  .leave-comment-area form .form-control {
    width: 100%;
    height: 40px;
    border: 1px solid #ebebeb;
    font-size: 14px;
    color: #b7b7b7;
    padding: 10px 20px;
    margin-bottom: 20px;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms; }
    .leave-comment-area form .form-control:focus {
      box-shadow: none;
      border-color: #70c745; }
  .leave-comment-area form textarea.form-control {
    width: 100%;
    height: 120px; }

/* :: 22.0 Sidebar Area CSS */
@media only screen and (max-width: 767px) {
  .post-sidebar-area {
    margin-top: 100px; } }

.single-widget-area {
  position: relative;
  z-index: 1;
  margin-bottom: 50px; }
  .single-widget-area .widget-title {
    width: 100%;
    position: relative;
    z-index: 2;
    margin-bottom: 30px; }
    .single-widget-area .widget-title h4 {
      position: relative;
      z-index: 5;
      text-transform: uppercase;
      margin-bottom: 0;
      line-height: 1; }
  .single-widget-area .widget-content img {
    margin-top: 20px;
    margin-bottom: 15px; }
  .single-widget-area .widget-content p {
    margin-bottom: 0;
    font-size: 16px;
    line-height: 1.6; }
  .single-widget-area .single-latest-post {
    position: relative;
    z-index: 1;
    margin-bottom: 30px; }
    .single-widget-area .single-latest-post:last-child {
      margin-bottom: 0; }
    .single-widget-area .single-latest-post .post-thumb {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 70px;
      flex: 0 0 70px;
      max-width: 70px;
      width: 70px;
      margin-right: 30px; }
    .single-widget-area .single-latest-post .post-content .post-title h6 {
      -webkit-transition-duration: 500ms;
      transition-duration: 500ms;
      font-size: 18px;
      margin-bottom: 10px;
      line-height: 1.3; }
      .single-widget-area .single-latest-post .post-content .post-title h6:hover, .single-widget-area .single-latest-post .post-content .post-title h6:focus {
        color: #70c745; }
    .single-widget-area .single-latest-post .post-content .post-date {
      display: block;
      font-size: 14px;
      margin-bottom: 0;
      color: #b7b7b7;
      line-height: 1; }
  .single-widget-area .popular-tags li a {
    display: inline-block;
    margin: 4px;
    padding: 10px 15px;
    line-height: 1;
    text-transform: uppercase;
    font-size: 14px;
    color: #707070;
    background-color: #f9f9f9; }
    .single-widget-area .popular-tags li a:hover, .single-widget-area .popular-tags li a:focus {
      color: #ffffff;
      background-color: #70c745; }
  .single-widget-area .author-widget {
    border: 1px solid #ebebeb;
    padding: 30px; }
    .single-widget-area .author-widget .author-thumb-name {
      position: relative;
      z-index: 1;
      padding-bottom: 20px;
      border-bottom: 1px solid #ebebeb;
      margin-bottom: 15px; }
      .single-widget-area .author-widget .author-thumb-name .author-thumb {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 80px;
        flex: 0 0 80px;
        max-width: 80px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-right: 30px; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .single-widget-area .author-widget .author-thumb-name .author-thumb {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50px;
            flex: 0 0 50px;
            max-width: 50px;
            width: 50px;
            height: 50px;
            margin-right: 15px; } }
        .single-widget-area .author-widget .author-thumb-name .author-thumb img {
          border-radius: 50%; }
      .single-widget-area .author-widget .author-thumb-name .author-name h5 {
        margin-bottom: 3px; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .single-widget-area .author-widget .author-thumb-name .author-name h5 {
            font-size: 14px; } }
      .single-widget-area .author-widget .author-thumb-name .author-name p {
        margin-bottom: 0; }
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .single-widget-area .author-widget .author-thumb-name .author-name p {
            font-size: 13px; } }
    .single-widget-area .author-widget .social-info a {
      display: inline-block;
      margin-right: 20px;
      color: #b7b7b7; }
      .single-widget-area .author-widget .social-info a:hover {
        color: #70c745; }
  .single-widget-area .single-best-seller-product {
    position: relative;
    z-index: 1;
    margin-bottom: 20px; }
    .single-widget-area .single-best-seller-product::after {
      margin-bottom: 0; }
    .single-widget-area .single-best-seller-product .product-thumbnail {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 70px;
      flex: 0 0 70px;
      max-width: 70px;
      width: 70px;
      margin-right: 30px; }
    .single-widget-area .single-best-seller-product .product-info a {
      display: block;
      color: #707070;
      font-size: 16px;
      font-weight: 400;
      margin-bottom: 5px; }
      .single-widget-area .single-best-seller-product .product-info a:hover, .single-widget-area .single-best-seller-product .product-info a:focus {
        color: #303030; }
    .single-widget-area .single-best-seller-product .product-info p {
      margin-bottom: 0;
      color: #303030;
      font-weight: 500; }
    .single-widget-area .single-best-seller-product .product-info .ratings i {
      font-size: 12px;
      color: #ff9800; }
  .single-widget-area .search-form {
    position: relative;
    z-index: 2; }
    .single-widget-area .search-form input {
      background-color: #ffffff;
      padding: 0 20px;
      width: 100%;
      height: 50px;
      font-size: 14px;
      color: #b7b7b7;
      border: 1px solid #ebebeb;
      border-radius: 0; }
      .single-widget-area .search-form input:focus {
        box-shadow: none; }
    .single-widget-area .search-form button {
      position: absolute;
      top: 0;
      right: 0;
      width: 50px;
      height: 50px;
      z-index: 10;
      border: none;
      background-color: #ffffff;
      cursor: pointer;
      color: #303030;
      border: 1px solid #ebebeb;
      border-left: none;
      -webkit-transition-duration: 300ms;
      transition-duration: 300ms; }
      .single-widget-area .search-form button:hover {
        color: #70c745; }

.single-post-details-area {
  position: relative;
  z-index: 1;
  margin-bottom: 50px; }
  .single-post-details-area .post-content .post-title {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    line-height: 1.5;
    margin-bottom: 15px;
    font-size: 32px; }
    @media only screen and (min-width: 768px) and (max-width: 991px) {
      .single-post-details-area .post-content .post-title {
        font-size: 26px; } }
    @media only screen and (max-width: 767px) {
      .single-post-details-area .post-content .post-title {
        font-size: 24px; } }
  .single-post-details-area .post-content .post-meta {
    position: relative;
    z-index: 1;
    margin-bottom: 10px; }
    .single-post-details-area .post-content .post-meta a {
      position: relative;
      z-index: 1;
      display: inline-block;
      font-size: 18px;
      color: #b7b7b7;
      margin-right: 30px; }
      .single-post-details-area .post-content .post-meta a:last-child::after {
        content: '/';
        top: 0;
        left: -20px;
        position: absolute;
        z-index: 1; }
      .single-post-details-area .post-content .post-meta a i {
        margin-right: 5px;
        color: #70c745; }
      .single-post-details-area .post-content .post-meta a:hover {
        color: #70c745; }
  .single-post-details-area .post-content blockquote {
    position: relative;
    z-index: 1;
    padding: 30px 50px;
    background-color: #f9f9f9; }
    .single-post-details-area .post-content blockquote .blockquote-text h5:last-child {
      color: #70c745; }

.post-tags-share {
  position: relative;
  z-index: 1;
  margin-bottom: 50px; }
  .post-tags-share .popular-tags span {
    font-size: 14px;
    text-transform: uppercase;
    margin-right: 15px; }
  .post-tags-share .popular-tags li a {
    display: inline-block;
    margin: 4px;
    padding: 10px 15px;
    background-color: #f9f9f9;
    line-height: 1;
    text-transform: uppercase;
    font-size: 13px;
    color: #707070; }
    .post-tags-share .popular-tags li a:hover, .post-tags-share .popular-tags li a:focus {
      color: #ffffff;
      background-color: #70c745; }
  .post-tags-share .post-share a {
    font-size: 14px;
    display: inline-block;
    padding: 0 10px; }
    .post-tags-share .post-share a:hover, .post-tags-share .post-share a:focus {
      color: #70c745; }
    @media only screen and (max-width: 767px) {
      .post-tags-share .post-share a {
        padding: 0 5px; } }

/* :: 23.0 Contact Area CSS */
.map-area {
  position: relative;
  z-index: 2;
  box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.15); }
  .map-area iframe {
    width: 100%;
    height: 400px;
    border: none;
    margin-bottom: 0;
    border-radius: 5px; }
    @media only screen and (max-width: 767px) {
      .map-area iframe {
        height: 320px; } }

.contact-form-area .form-control {
  position: relative;
  z-index: 2;
  height: 45px;
  width: 100%;
  background-color: #ffffff;
  font-size: 16px;
  margin-bottom: 15px;
  border: 1px solid #e1e1e1;
  border-radius: 2px;
  padding: 15px 20px;
  font-weight: 400;
  color: #b7b7b7;
  -webkit-transition-duration: 500ms;
  transition-duration: 500ms; }
  .contact-form-area .form-control:focus {
    box-shadow: none;
    border-color: #70c745; }
.contact-form-area textarea.form-control {
  height: 80px; }

.contact-information p {
  line-height: 1.3;
  color: #707070;
  margin-bottom: 13px; }
  .contact-information p span {
    color: #303030; }
  .contact-information p:last-child {
    margin-bottom: 0; }

.contact--thumbnail {
  position: relative;
  z-index: 1;
  box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.15); }
  @media only screen and (max-width: 767px) {
    .contact--thumbnail {
      margin-bottom: 100px; } }

/* :: 24.0 Portfolio Details Area CSS */



/* ======= The End ======= */


    #mainNavbar {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        background-color: transparent;
       
        height: 120px;
    }

    #mainNavbar.scrolled {
        background-color: black !important;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    /* تكبير الخط في الروابط */
    .navbar-nav .nav-link {
        font-size: 1.2rem;
        color: white !important;
        transition: color 0.3s ease;
       margin: 30px;
    }

    /* لون الهوفر */
    .navbar-nav .nav-link:hover,
    .dropdown-menu-dark .dropdown-item:hover {
        color: #70c745 !important;
    }

    /* Dropdown تعديلاته */
    .dropdown-menu-dark {
        background-color: #222;
        border: none;
    }

    .dropdown-menu-dark .dropdown-item {
        color: #fff;
        font-size: 1rem;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-left: 0.1rem;
    }

    .dropdown-submenu:hover > .dropdown-menu {
        display: block;
    }

    

    .top-header-meta {
    display: flex;
    align-items: center; /* تأكد أن العناصر على نفس المستوى الرأسي */
    gap: 20px; /* المسافة بين عناصر Login وCart */
}
.login, .cart {
    display: flex;
    align-items: center;
}

.login-link, .cart a {
    display: flex;
    align-items: center;
    gap: 6px;
    color: white;
    text-decoration: none;
    font-size: 12px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    margin: 5px;
}

.login-link i,
.cart a i {
    color: #4CAF50;
    font-size: 14px;
}


/*# sourceMappingURL=style.css.map */
    </style>
</head>
<body>

    {{-- Header --}}
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="info@leafyland.com">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                                    <span>Email: info@leafyland.com</span>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 567 890">
                                    <i class="fa fa-phone" aria-hidden="true"></i>  
                                    <span>Call Us: +962 7 0000 0000</span>
                                </a>
                            </div>
                    
                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->
                                {{-- <div class="language-dropdown">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i  aria-hidden="true"></i> Language
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> English</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Arabic</a>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Login -->
                                <div class="login">
                                  @if(Auth::check())
                                      <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                          @csrf
                                          <button type="submit" class="login-link">
                                              <i class="fa fa-user" aria-hidden="true"></i> 
                                              <span>Logout</span>
                                          </button>
                                      </form>
                                  @else
                                      <a href="{{ route('login') }}" class="login-link">
                                          <i class="fa fa-user" aria-hidden="true"></i> 
                                          <span>Login</span>
                                      </a>
                                  @endif
                              </div>
                                <!-- Cart -->
                                <div class="cart">
                                  <a href="{{ route('cart.view') }}">
                                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                      <span>Cart <span class="cart-quantity">0</span></span>
                                  </a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                <!-- Bootstrap Navbar -->
                <nav class="navbar navbar-expand-lg fixed-top navbar-dark" id="mainNavbar">
                    <div class="container d-flex justify-content-between align-items-center">
                        <!-- Logo على اليسار -->
                        <a class="navbar-brand me-auto" href="{{ route('home') }}">
                            <img src="{{ asset('img/core-img/logo2.png') }}" alt="Logo" style="height: 130px;">
                        </a>
                
                        <!-- زر القائمة عند الشاشة الصغيرة -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                
                        <!-- قائمة الروابط -->
                        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                
                                <!-- Dropdown -->
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                                        <li><a class="dropdown-item" href="{{ route('about') }}">About</a></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">Shop</a>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li><a class="dropdown-item" href="{{ route('shop') }}">Shop</a></li>
                                                <div class="cart">
                                                  <a href="{{ route('cart.view') }}">
                                                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                                      <span>Cart <span class="cart-quantity">0</span></span>
                                                  </a>
                                              </div>
                                                <li><a class="dropdown-item" href="{{ route('checkout') }}">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">Blog</a>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a></li>
                                                <li><a class="dropdown-item" href="{{ route('blog-details') }}">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </li> --}}
                
                                <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                

    
                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer-area" style="background-color: #2e8b57; color: #fff; padding: 60px 0;">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">
    
                    <!-- About LeafyLand -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="single-footer-widget">
                            <div class="footer-logo">
                                <a href="#">
                                    <img src="img/core-img/logo2.png" alt="LeafyLand Logo" style="height: 100px; width: 100px">
                                </a>
                            </div>
                            <p style="font-size: 14px; line-height: 1.6;">
                                At LeafyLand, we bring nature to your doorstep. Explore our wide range of plants, gardening tools, and expert advice to create your green paradise.
                            </p>
                            <div class="social-info mt-4">
                                <a href="#" style="color: #fdfeff; margin-right: 10px; font-size: 15px;"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" style="color: #fdfeff; margin-right: 10px; font-size: 15px;"><i class="fab fa-instagram"></i></a>
                                <a href="#" style="color:  #fdfeff; margin-right: 10px; font-size: 15px;"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" style="color:  #fdfeff; margin-right: 10px; font-size: 15px;"><i class="fab fa-whatsapp"></i></a>
                                
                            </div>
                        </div>
                    </div>
    
                    <!-- Quick Links -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="single-footer-widget">
                            <div class="widget-title mb-3">
                                <h5 style="font-size: 18px; font-weight: 600; margin-top: 45px; color: #fff;">
                                    <i class="fas fa-link" style="margin-right: 8px;"></i>QUICK LINKS
                                </h5>
                            </div>
                            <nav class="widget-nav">
                                <ul style="list-style: none; padding: 0;">
                                    <li style="margin-bottom: 8px;">
                                        <a href="#" style="color: #fff; text-decoration: none; font-size: 14px; line-height: 2;">
                                            <i class="fas fa-home" style="margin-right: 10px; width: 20px; text-align: center;"></i>Home
                                        </a>
                                    </li>
                                    <li style="margin-bottom: 8px;">
                                        <a href="#" style="color: #fff; text-decoration: none; font-size: 14px; line-height: 2;">
                                            <i class="fas fa-shopping-bag" style="margin-right: 10px; width: 20px; text-align: center;"></i>Shop
                                        </a>
                                    </li>
                                    <li style="margin-bottom: 8px;">
                                        <a href="#" style="color: #fff; text-decoration: none; font-size: 14px; line-height: 2;">
                                            <i class="fas fa-blog" style="margin-right: 10px; width: 20px; text-align: center;"></i>Blog
                                        </a>
                                    </li>
                                    <li style="margin-bottom: 8px;">
                                        <a href="#" style="color: #fff; text-decoration: none; font-size: 14px; line-height: 2;">
                                            <i class="fas fa-envelope" style="margin-right: 10px; width: 20px; text-align: center;"></i>Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
    
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="single-footer-widget">
                            <div class="widget-title mb-3">
                                <h5 style="font-size: 18px; font-weight: 600;margin-top: 45px;">GARDENING TIPS</h5>
                            </div>
                    
                            <!-- Tip 1 -->
                            <div class="single-tip d-flex align-items-center mb-3">
                                <div class="tip-icon mr-3">
                                    <i class="fa fa-leaf" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
                                </div>
                                <div class="tip-info">
                                    <a href="#" style="color: #fff; text-decoration: none; font-size: 14px; font-weight: 500;">How to Care for Succulents</a>
                                    <p style="font-size: 13px; color: #e0e0e0; margin: 0;">Learn the best practices for succulent care.</p>
                                </div>
                            </div>
                    
                            <!-- Tip 2 -->
                            <div class="single-tip d-flex align-items-center">
                                <div class="tip-icon mr-3">
                                    <i class="fa fa-tint" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
                                </div>
                                <div class="tip-info">
                                    <a href="#" style="color: #fff; text-decoration: none; font-size: 14px; font-weight: 500;">Watering Your Plants</a>
                                    <p style="font-size: 13px; color: #e0e0e0; margin: 0;">Discover the right way to water your plants.</p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Contact Us -->
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="single-footer-widget">
                            <div class="widget-title mb-3">
                                <h5 style="font-size: 18px; font-weight: 600;margin-top: 45px;">CONTACT US</h5>
                            </div>
    
                            <div class="contact-information">
                                <p style="font-size: 14px; line-height: 1.8;"><span style="font-weight: 600;">Address:</span> 123 Green Valley, Aqaba, Jordan</p>
                                <p style="font-size: 14px; line-height: 1.8;"><span style="font-weight: 600;">Phone:</span> +962 7 0000 0000</p>
                                <p style="font-size: 14px; line-height: 1.8;"><span style="font-weight: 600;">Email:</span> info@leafyland.com</p>
                                <p style="font-size: 14px; line-height: 1.8;"><span style="font-weight: 600;">Open Hours:</span> sun - wed: 8 AM - 8 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area" style="margin-top: 40px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p style="font-size: 14px; margin: 0;color: #fff;">&copy; 2023 LeafyLand. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  <!-- Scripts -->

  
</body>

<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Active js -->
<script >
(function ($) {
    'use strict';

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
        $('.preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // :: 2.0 Nav Active Code
    if ($.fn.classyNav) {
        $('#alazeaNav').classyNav();
    }

    // :: 3.0 Search Active Code
    $('#searchIcon').on('click', function () {
        $('.search-form').toggleClass('active');
    });
    $('.closeIcon').on('click', function () {
        $('.search-form').removeClass('active');
    });

    // :: 4.0 Sliders Active Code
    if ($.fn.owlCarousel) {
        var welcomeSlide = $('.hero-post-slides');
        var testiSlides = $('.testimonials-slides');
        var portfolioSlides = $('.portfolio-slides');

        welcomeSlide.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            center: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000
        });

        testiSlides.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 700,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut'
        });

        portfolioSlides.owlCarousel({
            items: 2,
            margin: 30,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            smartSpeed: 700,
            center: true
        });
    }

    // :: 5.0 Masonary Gallery Active Code
    if ($.fn.imagesLoaded) {
        $('.alazea-portfolio').imagesLoaded(function () {
            // filter items on button click
            $('.portfolio-filter').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            // init Isotope
            var $grid = $('.alazea-portfolio').isotope({
                itemSelector: '.single_portfolio_item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.single_portfolio_item'
                }
            });
        });
    }

    // :: 6.0 magnificPopup Active Code
    if ($.fn.magnificPopup) {
        $('.portfolio-img, .product-img').magnificPopup({
            gallery: {
                enabled: true
            },
            type: 'image'
        });
        $('.video-icon').magnificPopup({
            type: 'iframe'
        });
    }

    // :: 7.0 Barfiller Active Code
    if ($.fn.barfiller) {
        $('#bar1').barfiller({
            tooltip: true,
            duration: 1000,
            barColor: '#70c745',
            animateOnResize: true
        });
        $('#bar2').barfiller({
            tooltip: true,
            duration: 1000,
            barColor: '#70c745',
            animateOnResize: true
        });
        $('#bar3').barfiller({
            tooltip: true,
            duration: 1000,
            barColor: '#70c745',
            animateOnResize: true
        });
        $('#bar4').barfiller({
            tooltip: true,
            duration: 1000,
            barColor: '#70c745',
            animateOnResize: true
        });
    }

    // :: 8.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
        browserWindow.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i>'
        });
    }

    // :: 9.0 CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: 10.0 Sticky Active Code
    if ($.fn.sticky) {
        $(".alazea-main-menu").sticky({
            topSpacing: 0
        });
    }

    // :: 11.0 Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip()
    }

    // :: 12.0 Price Range Active Code
    $('.slider-range-price').each(function () {
        var min = jQuery(this).data('min');
        var max = jQuery(this).data('max');
        var unit = jQuery(this).data('unit');
        var value_min = jQuery(this).data('value-min');
        var value_max = jQuery(this).data('value-max');
        var label_result = jQuery(this).data('label-result');
        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            slide: function (event, ui) {
                var result = label_result + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                console.log(t);
                t.closest('.slider-range').find('.range-price').html(result);
            }
        });
    })

    // :: 13.0 prevent default a click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

    // :: 14.0 wow Active Code
    if (browserWindow.width() > 767) {
        new WOW().init();
    }

})(jQuery);
</script>
<script>
  window.addEventListener('scroll', function () {
      const navbar = document.getElementById('mainNavbar');
      if (window.scrollY > 50) {
          navbar.classList.add('scrolled');
      } else {
          navbar.classList.remove('scrolled');
      }
  });
</script>
<script>
// إذا كنت تستخدم jQuery
$(function () {
$('[data-toggle="tooltip"]').tooltip()
});

// إذا كنت تستخدم Bootstrap 5 vanilla JS
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// JavaScript لتحديث عدد المنتجات في السلة عند إضافة منتج
document.querySelector('.add-to-cart-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let formData = new FormData(this);
    
    fetch("{{ route('cart.add') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // التحديث الفوري للعداد قبل جلب البيانات
            const badges = document.querySelectorAll('.cart-quantity');
            if (badges.length > 0) {
                const current = parseInt(badges[0].textContent) || 0;
                badges.forEach(b => b.textContent = current + parseInt(formData.get('quantity') || 1));
            }
            
            // ثم جلب العدد الحقيقي من السيرفر
            updateCartQuantity();
            
            Swal.fire({
                icon: 'success',
                title: 'Added to Cart',
                text: 'The product has been added successfully!',
                timer: 1500,
                showConfirmButton: false
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Failed to add to cart'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Network error occurred.'
        });
    });
});
function updateCartQuantity() {
    fetch("{{ route('cart.count') }}", { // تغيير المسار إلى route خاص بالعد فقط
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        const totalQuantity = data.total || 0;
        document.querySelectorAll('.cart-quantity').forEach(badge => {
            badge.textContent = totalQuantity;
            badge.style.display = totalQuantity > 0 ? 'inline-block' : 'none';
        });
    })
    .catch(error => {
        console.error('Error updating cart quantity:', error);
        // تحديث بديل في حالة الخطأ
        const badges = document.querySelectorAll('.cart-quantity');
        if (badges.length > 0) {
            const current = parseInt(badges[0].textContent) || 0;
            badges.forEach(b => b.textContent = current + 1);
        }
    });
}
  
document.querySelectorAll('.quantity-input').forEach(input => {
  input.addEventListener('change', function() {
      const cartId = this.dataset.cartId;
      const newQuantity = this.value;
      const maxQuantity = this.dataset.max;
      const row = this.closest('tr');
      const price = parseFloat(row.querySelector('td:nth-child(5)').textContent.replace('$', ''));

      if (parseInt(newQuantity) > parseInt(maxQuantity)) {
          Swal.fire({
              icon: 'error',
              title: 'Quantity Exceeded',
              text: `Only ${maxQuantity} items available in stock.`
          });
          this.value = maxQuantity;
          return;
      }

      fetch("{{ route('cart.update') }}", {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
              cart_id: cartId,
              quantity: newQuantity
          })
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              // تحديث السعر الإجمالي للعنصر
              row.querySelector('.item-total').textContent = '$' + (price * newQuantity).toFixed(2);
              
              // تحديث الإجماليات
              document.getElementById('subtotal').textContent = '$' + data.totals.subtotal.toFixed(2);
              document.getElementById('shipping-cost').textContent = '$' + data.totals.shipping.toFixed(2);
              document.getElementById('total').textContent = '$' + data.totals.total.toFixed(2);
              
              Swal.fire({
                  icon: 'success',
                  title: 'Updated',
                  text: 'Quantity updated successfully!',
                  timer: 1200,
                  showConfirmButton: false
              });
          }
      })
      .catch(error => {
          Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error occurred while updating quantity.'
          });
      });
  });
});



</script>
<style>

.nav-tabs .nav-link {
    color:#000;
    border: none;
    padding: 12px 24px;
    font-size: 1rem;
}


  ul.nav-tabs .nav-link.active {
      color: #198754 !important;               
      border-color: #198754 #198754 #fff !important; 
      background-color: #e9f6ee !important;    
      border-bottom: 2px solid #000; 
  }
  

  ul.nav-tabs .nav-link:hover {
      color: #157347 !important;
  }

  
  </style>
  

</html>
