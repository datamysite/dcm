<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DCM Extension - Welcome!</title>
    <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="https://dealsandcouponsmena.ae/public/web_assets/images/logo/dcm-logo-r.png">
    <link rel="mask-icon" href="https://dealsandcouponsmena.ae/public/web_assets/images/logo/dcm-logo-r.png" color="#1DC6FE">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{URL::to('/public')}}/web_assets/js/app.js"></script>

    <style>
        a,
        b,
        body,
        div,
        figure,
        form,
        h2,
        h3,
        html,
        img,
        label,
        li,
        nav,
        ol,
        p,
        span,
        strong,
        ul {
            border: 0;
            font-size: 100%;
            font: inherit;
            margin: 0;
            padding: 0;
            vertical-align: initial
        }

        h2 {
            color: #fff
        }

        a,
        b,
        body,
        div,
        figure,
        form,
        h1,
        h2,
        h3,
        html,
        i,
        img,
        label,
        li,
        nav,
        ol,
        p,
        span,
        strong,
        ul {
            border: 0;
            font-size: 100%;
            font: inherit;
            margin: 0;
            padding: 0;
            vertical-align: initial
        }

        :focus {
            outline: 0
        }

        figure,
        nav {
            display: block
        }

        ol,
        ul {
            list-style: none
        }


        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        figure,
        form {
            margin: 0
        }

        button,
        input {
            border-radius: 0;
            font-family: Noto Sans, Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 100%;
            margin: 0;
            vertical-align: initial
        }

        button {
            text-transform: none
        }

        button {
            -webkit-appearance: button
        }

        input[type=search] {
            -webkit-appearance: none
        }

        input[type=search]::-webkit-search-cancel-button,
        input[type=search]::-webkit-search-decoration {
            -webkit-appearance: none
        }

        button::-moz-focus-inner,
        input::-moz-focus-inner {
            border: 0;
            padding: 0
        }

        button,
        html,
        input {
            color: #62686a
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            vertical-align: middle
        }

        a {
            text-decoration: none
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 600
        }

        h1,
        h2 {
            color: #fff
        }

        h2 {
            font-size: 1rem
        }

        h2,
        h3 {
            font-weight: 400
        }

        h3 {
            color: #181a1b;
            font-size: 1.25rem
        }

        html {
            box-sizing: border-box;
            color: #62686a;
            font-family: Noto Sans, Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 100%;
            font-weight: 400;
            line-height: normal
        }

        body {
            -webkit-font-smoothing: antialiased;
            --app-height: 100%;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden
        }

        .body--overflow,
        .body--shadow {
            overflow: hidden;
            position: fixed;
            width: 100vw
        }

        .body--shadow:after {
            background-color: #00000080;
            content: "";
            height: 100%;
            position: absolute;
            width: 100%;
            z-index: 20
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        .container,
        .container--flex {
            box-sizing: initial;
            margin-left: auto;
            margin-right: auto;
            max-width: 1250px;
            padding-left: 20px;
            padding-right: 20px;
            width: calc(100% - 40px)
        }

        @media (min-width:480px) {

            .container,
            .container--flex {
                width: 90%
            }
        }

        @media (min-width:767px) {

            .container,
            .container--flex {
                width: 85%
            }
        }

        .container--flex {
            display: flex
        }

        .img--responsive {
            height: auto;
            max-width: 100%
        }

        a {
            color: #181a1b
        }

        a:visited {
            text-decoration: none
        }

        .g--highlight {
            color: #1caae2;
            font-weight: 600
        }

        .link {
            color: #006aa8
        }

        .spinner {
            background: #fff;
            height: 100%;
            width: 100%;
            z-index: 1
        }

        .spinner,
        .spinner:before {
            left: 0;
            position: absolute;
            right: 0;
            top: 0
        }

        .spinner:before {
            animation-duration: .5s;
            animation-iteration-count: infinite;
            animation-name: spin;
            animation-timing-function: linear;
            background: 0 0;
            border-radius: 50%;
            border-right: 2px solid #0000;
            border-top: 2px solid #e13d3f;
            bottom: 0;
            content: "";
            height: 30px;
            margin: auto;
            width: 30px
        }

        .image-placeholder {
            background-color: #e4e6e7;
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: -1px;
            width: 100%;
            z-index: 1
        }

        .image-placeholder--white {
            background-color: #fff
        }

        .grecaptcha-badge {
            visibility: hidden
        }

        .js-btn-link {
            background: 0 0;
            border: none;
            padding: 0
        }

        .icon--check {
            border: 2px solid #0000;
            border-radius: 100px;
            box-sizing: border-box;
            height: 22px;
            position: relative;
            transform: scale(var(--ggs, 1));
            width: 22px
        }

        .icon--check:after {
            border-style: solid;
            border-width: 0 3px 3px 0;
            box-sizing: border-box;
            content: "";
            display: block;
            height: 14px;
            left: 2px;
            position: absolute;
            top: -3px;
            transform: rotate(45deg);
            transform-origin: bottom left;
            width: 7px
        }

        .btn {
            align-items: center;
            background-color: var(--button-bg-color);
            border: 3px solid var(--button-border-color, var(--button-bg-color));
            border-radius: 30px;
            box-shadow: 0 0 0 1px var(--button-box-shadow-color);
            color: var(--button-text-color);
            display: flex;
            font-family: Noto Sans, Helvetica Neue, Helvetica, Arial, sans-serif;
            font-weight: 600;
            height: 45px;
            justify-content: center;
            padding: 8px
        }

        .btn--blue {
            --button-bg-color: #1caae2;
            --button-text-color: #0c4013;
            --button-hover-text-color: #0c4013;
            --button-focus-text-color: #fff;
            --button-focus-border-color: #fff;
            --button-loading-bg-color: #1DC6FE;
            --button-loading-text-color: #fff;
            --button-loading-loader-bg: #ffffff4d;
            --button-hover-code-bg-color: #1DC6FE;
        }

        .brand-logo {
            background-color: #fff;
            flex-wrap: wrap;
            overflow: hidden
        }

        .brand-logo,
        .brand-logo__link {
            align-items: center;
            display: flex;
            height: 100%;
            justify-content: center;
            position: relative;
            width: 100%
        }

        .brand-logo__link {
            padding: 0 16px
        }

        .section-header {
            flex: 1 1 100%;
            margin-bottom: 12px
        }

        .section-header--small .section-header__title {
            font-weight: 400
        }

        .section-header__title {
            color: #313435;
            font-size: .875rem;
            font-weight: 600;
            letter-spacing: -.01em;
            line-height: 1.3571428571em
        }

        @media (min-width:767px) {
            .section-header {
                margin-bottom: 16px
            }

            .section-header--small .section-header__title {
                font-size: 1.125rem;
                font-weight: 600;
                line-height: 1.3333333333em
            }

            .section-header__title {
                font-size: 1.25rem;
                line-height: 1.35em
            }
        }

        .section-header__subtitle {
            color: #62686a;
            font-size: .75rem;
            letter-spacing: -.01em;
            line-height: 1.4166666667em;
            margin-top: 16px
        }

        @media (min-width:767px) {
            .section-header__subtitle {
                font-size: 1rem;
                letter-spacing: -.0075em;
                line-height: 1.375em
            }
        }

        .section-header__partner {
            color: #313435;
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: -.01em;
            line-height: 1.4166666667em;
            position: absolute;
            right: 20px;
            text-align: right;
            top: -29px
        }

        .section-header__logo {
            height: 38px;
            margin-top: 4px;
            width: auto
        }

        @media (min-width:480px) {
            .section-header__partner {
                align-items: center;
                display: flex;
                font-size: 1rem;
                letter-spacing: -.01em;
                line-height: 1.375em;
                top: -16px
            }

            .section-header__logo {
                height: 55px;
                margin: 0 0 0 16px
            }
        }

        .section-header__logo:hover {
            outline: 0
        }

        .section-header__img {
            height: 100%
        }

        .main__offers-header {
            grid-area: header
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e4e6e7;
            height: 50px;
            min-height: 50px;
            order: -2;
            z-index: 200
        }

        @media (min-width:767px) {
            .navbar {
                height: 66px;
                min-height: 66px
            }
        }

        .navbar__container {
            align-items: center;
            height: 100%;
            justify-content: space-between;
            position: relative
        }

        @media (min-width:1279px) {
            .navbar__container {
                align-items: stretch;
                position: static
            }
        }

        .navbar__logo {
            background-color: #fff
        }

        .navbar__menu {
            align-items: stretch;
            display: none
        }

        @media (max-width:1278px) {
            .navbar__menu-element {
                flex-direction: column;
                justify-items: stretch
            }
        }

        .navbar__menu-element {
            display: flex
        }

        @media (min-width:1279px) {
            .navbar__menu {
                display: flex;
                width: 100%
            }

            .navbar__menu-element--right {
                justify-content: flex-end;
                margin-left: auto;
                margin-right: 0
            }

            .navbar__search {
                align-self: center;
                height: 44px;
                max-width: 420px;
                width: 100%
            }
        }

        @media (max-width:1278px) {
            .navbar__search {
                align-items: center;
                display: flex;
                justify-content: center;
                order: -1
            }

            .nav .nav__item:first-child {
                border-top: 1px solid #f4f5f5
            }
        }

        .logo {
            align-items: center;
            display: flex;
            height: 100%;
            padding: 0
        }

        @media (min-width:480px) {
            .logo {
                left: 50%;
                position: absolute;
                transform: translateX(-50%)
            }
        }

        .logo__image,
        .logo__link {
            display: block
        }

        .logo__image {
            height: 25px;
            max-width: 124px;
            width: auto
        }

        @media (min-width:767px) {
            .logo__image {
                height: 31px
            }
        }

        @media (min-width:1279px) {
            .logo {
                padding: 0 16px;
                position: static;
                transform: none
            }

            .logo__image {
                height: 38px
            }

            .nav {
                flex-direction: row;
                overflow: hidden;
                width: 100%
            }

            .nav--hide-desktop {
                display: none
            }
        }

        .nav__item {
            align-items: stretch;
            border-bottom: 1px solid #f4f5f5;
            display: flex;
            padding: 0 20px
        }

        .nav__item-img {
            align-self: center;
            max-height: 43px;
            position: absolute;
            right: 20px
        }

        @media (min-width:767px) {
            .nav__item {
                padding: 0 7.5%
            }

            .nav__item-img {
                right: 7.5%
            }
        }

        @media (min-width:1279px) {
            .nav__item {
                border: 0;
                height: 100%;
                padding: 0
            }

            .nav__item-img {
                display: none
            }
        }

        .nav__link {
            align-items: center;
            color: #313435;
            display: flex;
            font-size: .875rem;
            height: 100%;
            letter-spacing: -.025em;
            line-height: 3.2142857143em;
            padding: 0;
            white-space: nowrap;
            width: 100%
        }

        .nav__icons {
            align-items: center;
            display: flex;
            margin-right: 5px;
            order: -1
        }

        @media (min-width:1279px) {
            .nav__link {
                font-size: 1rem;
                letter-spacing: -.025em;
                line-height: 1em;
                padding: 0 24px
            }

            .nav__icons {
                display: none
            }
        }

        .nav-item-cashback {
            border: 0;
            padding: 0;
            position: static
        }

        .nav-item-cashback__button {
            background-color: initial;
            border: 0
        }

        @media (max-width:1278px) {
            .nav-item-cashback__button {
                padding: 5px
            }
        }

        .nav-item-cashback__button--active {
            color: #181a1b
        }

        @media (min-width:1279px) {
            .nav-item-cashback__button--active {
                background-color: #f4f5f5
            }
        }

        .nav-item-cashback__amount {
            font-weight: 600;
            margin-right: 12px
        }

        .nav-item-cashback__image-container {
            align-items: center;
            align-self: center;
            background-color: #f4f5f5;
            border-radius: 100%;
            display: inline-flex;
            height: 45px;
            justify-content: center;
            overflow: hidden;
            width: 45px
        }

        @media (max-width:766px) {
            .nav-item-cashback__image-container {
                height: 30px;
                margin-left: 0;
                width: 30px
            }

            .nav-my-dcm__item {
                font-size: .75rem;
                letter-spacing: -.01em;
                line-height: 1.4166666667em
            }
        }

        .nav-item-cashback__image {
            max-height: 100%;
            max-width: 100%
        }

        .nav-item-cashback__image--default {
            left: 10%;
            position: relative;
            top: 10%
        }

        .nav-my-dcm {
            align-self: center;
            background-color: var(--button-bg-color, #68d475);
            border-radius: 31px;
            display: flex;
            font-weight: 600;
            height: 32px
        }

        @media (min-width:767px) {
            .nav-item-cashback {
                position: relative
            }

            .nav-my-dcm {
                height: 45px
            }
        }

        @media (min-width:1279px) {
            .nav-my-dcm {
                background-color: initial;
                border-radius: 0
            }
        }

        .nav-my-dcm__item {
            border: 0;
            border-radius: 31px;
            box-shadow: none;
            display: none;
            text-align: center
        }

        .nav-my-dcm__item--active {
            display: flex;
            padding: 0
        }

        @media (max-width:1278px) {
            .nav-my-dcm__link {
                padding: 0 12px 0 16px
            }
        }

        .nav-my-dcm__switch {
            display: flex;
            justify-content: center;
            width: 40px
        }

        .nav-my-dcm__switch:after {
            align-self: center;
            border: 5px solid #0000;
            border-top: 5px solid var(--button-text-color);
            border-width: 7px;
            content: "";
            display: inline-block;
            height: 0;
            position: relative;
            right: -8px;
            right: 4px;
            top: 4px;
            width: 0
        }

        @media (min-width:1279px) {
            .nav-my-dcm__item {
                display: flex
            }

            .nav-my-dcm__item--active {
                font-weight: 600
            }

            .nav-my-dcm__switch {
                display: none
            }
        }

        .mp-dropdown {
            background-color: #fff;
            display: none;
            height: calc(100% - 50px);
            max-width: 400px;
            overflow: auto;
            padding: 24px 20px;
            position: fixed;
            right: 0;
            top: 50px;
            width: 70vw
        }

        @media (min-width:767px) {
            .mp-dropdown {
                height: calc(100% - 66px);
                top: 66px
            }
        }

        @media (min-width:1279px) {
            .mp-dropdown {
                border-radius: 4px;
                box-shadow: 0 3px 6px #181a1b29;
                height: auto;
                padding: 0;
                position: absolute;
                right: 0;
                top: calc(100% + 6px);
                width: 220px
            }
        }

        .sp-challenge-navbar__box {
            grid-column-gap: 8px;
            grid-row-gap: 24px;
            border: 1px solid #68d475;
            border-radius: 8px;
            display: grid;
            grid-template-areas: "image description" "button button";
            margin: 16px auto;
            padding: 24px 16px;
            width: calc(100% - 32px)
        }

        @media (min-width:1279px) {
            .sp-challenge-navbar__box {
                display: none
            }
        }

        .sp-challenge-navbar__image {
            grid-area: image
        }

        .sp-challenge-navbar__description {
            color: #181a1b;
            grid-area: description
        }

        .sp-challenge-navbar__button {
            grid-area: button
        }

        .cashback-label {
            grid-gap: 2px;
            align-items: center;
            border-radius: 0 0 8px 8px;
            color: #147620;
            display: flex;
            font-size: .625rem;
            font-weight: 600;
            height: 22px;
            justify-content: center;
            letter-spacing: .01em;
            line-height: 2em;
            min-width: 15.437px;
            padding: 0 4px;
            text-transform: uppercase;
            width: 100%
        }

        .cashback-label:before {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='15.437' height='15.437'%3E%3Cpath d='M15.437 7.719a7.73 7.73 0 0 1-14.81 3.113 7.73 7.73 0 0 1 12.317-8.793 7.72 7.72 0 0 1 2.493 5.68z' fill='%23f0cd00'/%3E%3Cpath d='M14.863 7.714a7.72 7.72 0 0 1-7.432 7.713A7.72 7.72 0 0 1 .003 7.713 7.72 7.72 0 0 1 7.431 0a7.72 7.72 0 0 1 7.432 7.714z' fill='%23ffca00'/%3E%3Cpath d='M12.945 2.039 2.038 12.945a7.77 7.77 0 0 1-.977-1.318L11.627 1.062c.473.278.915.605 1.318.977zm1.959 2.856L4.895 14.904a7.71 7.71 0 0 1-1.957-1.123L13.781 2.938a7.7 7.7 0 0 1 1.123 1.957z' fill='%23fff12c'/%3E%3Cg fill='%23f8ab25'%3E%3Cpath d='M13.718 7.72a6 6 0 0 1-10.239 4.241 6.06 6.06 0 0 1-.662-.786 5.974 5.974 0 0 1-1.095-3.381V7.72a6 6 0 0 1 6-6h.074a5.973 5.973 0 0 1 3.381 1.094 6.048 6.048 0 0 1 1.652 1.758c.584.946.892 2.036.889 3.148z'/%3E%3Cpath d='m11.961 3.479-8.482 8.482a6.06 6.06 0 0 1-.662-.786 5.974 5.974 0 0 1-1.095-3.381V7.72a6 6 0 0 1 6-6h.074a5.973 5.973 0 0 1 3.381 1.094 6.06 6.06 0 0 1 .784.665z'/%3E%3Cpath d='M13.716 7.72a6 6 0 0 1-6 6q-.171 0-.338-.01a6 6 0 0 0 0-11.977q.168-.009.338-.009a6 6 0 0 1 6 5.996z'/%3E%3C/g%3E%3Ccircle cx='7.75' cy='7.75' r='4.25' fill='%23fff12c'/%3E%3C/svg%3E");
            content: "";
            height: 15.437px;
            min-width: 15.437px
        }

        @media (min-width:767px) {
            .cashback-label {
                font-size: .75rem;
                font-weight: 400;
                line-height: 1.4166666667em
            }
        }

        .search {
            background-color: #fff;
            border-bottom: 1px solid #f4f5f5;
            border-top: 1px solid #f4f5f5;
            display: flex;
            padding: 10px 20px;
            z-index: 100
        }

        @media (min-width:480px) {
            .search {
                padding: 10px 5%
            }
        }

        @media (min-width:767px) {
            .search {
                margin: 0;
                padding: 10px 7.5%
            }
        }

        @media (min-width:1279px) {
            .search {
                border: 0;
                margin-left: 16px;
                padding: 0
            }
        }

        .search__container {
            align-items: center;
            background-color: #fff;
            border: 1px solid #cacdce;
            border-radius: 25px;
            display: flex;
            min-height: 42px;
            position: relative;
            width: 100%
        }

        .search__label {
            clip: rect(0 0 0 0);
            border: 0;
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }

        .search__input {
            border: 0;
            border-radius: 25px 0 0 25px;
            border-right: 0;
            flex-grow: 1;
            font-size: .875rem;
            height: 38px;
            letter-spacing: -.025em;
            line-height: 1.1428571429em;
            padding: 12px 12px 12px 24px;
            width: calc(100% - 55px);
            z-index: 15
        }

        .search__input {
            color: #62686a
        }

        .search__button {
            align-items: center;
            background-color: #fff;
            border: none;
            border-left: 0;
            box-sizing: initial;
            display: flex;
            justify-content: center;
            margin-right: 16px;
            max-width: 33px;
            padding: 0 4px;
            text-align: center;
            width: 33px
        }

        .micromodal-slide {
            display: none
        }

        .custom-checkbox {
            position: relative
        }

        .custom-checkbox__label {
            display: block;
            padding-left: 24px
        }

        .custom-checkbox__input {
            height: 0;
            left: -9999px;
            position: absolute;
            width: 0
        }

        .custom-checkbox__custom {
            background-color: #fff;
            border: 2px solid #e13d3f;
            height: 16px;
            left: 0;
            position: absolute;
            top: 0;
            width: 16px
        }

        .footer {
            background: #e1e1e1;
            margin-top: auto;
            padding: 24px 0
        }

        .footer__affiliation {
            color: #fff;
            display: block;
            font-size: .875rem;
            grid-area: afi;
            line-height: 1.5em;
            margin: 16px 0;
            text-align: center
        }

        .footer__copyrights {
            color: #fff;
            display: block;
            font-size: .875rem;
            grid-area: copy;
            line-height: 1.5em;
            margin-top: 8px;
            text-align: center
        }

        .social-icons {
            display: flex;
            gap: 16px;
            grid-area: social;
            justify-content: center;
            margin-bottom: 16px
        }

        .footer-nav--top {
            grid-area: nav-top
        }

        .footer-nav--bottom {
            grid-area: nav-bottom
        }

        .footer-app {
            display: flex;
            flex-wrap: wrap;
            grid-area: app;
            justify-content: center
        }

        .register-form {
            display: none;
            text-align: center
        }

        .register-form--active {
            display: block
        }

        .register-form__social-container--icons-only {
            grid-gap: 16px;
            display: flex;
            justify-content: center
        }

        .register-form__social-container--icons-only .register-form__social-button {
            margin-bottom: 0;
            padding: 8px;
            width: 45px
        }

        .register-form__social-button {
            grid-gap: 8px;
            border-radius: 30px;
            font-size: .875rem;
            font-weight: 600;
            line-height: 1.3571428571em;
            margin-bottom: 12px;
            min-height: 45px;
            padding: 8px 16px;
            width: 100%
        }

        .register-form__social-button-icon {
            background-color: var(--button-text-color, #fff);
            background-position: 50%;
            background-repeat: no-repeat;
            display: inline-block;
            height: 20px;
            min-width: 20px
        }

        .register-form__delimiter {
            align-items: center;
            display: flex;
            font-size: .75rem;
            font-weight: 500;
            justify-content: center;
            letter-spacing: -.01em;
            line-height: 1.4166666667em;
            margin-bottom: 12px;
            margin-top: 12px;
            position: relative
        }

        .register-form__delimiter:before {
            background-color: #cacdce;
            content: "";
            height: 1px;
            position: absolute;
            width: 100%;
            z-index: 1
        }

        .register-form__delimiter-text {
            background-color: #fff;
            padding: 0 16px;
            z-index: 2
        }

        .register-form__by-email {
            color: #313435;
            display: block;
            font-size: .875rem;
            font-weight: 600;
            letter-spacing: -.01em;
            line-height: 1.3571428571em;
            margin-top: 24px
        }

        .register-form__form {
            margin-top: 12px;
            text-align: left
        }

        .register-form__input-container {
            display: flex;
            flex-direction: column;
            position: relative;
            width: 100%
        }

        .register-form__input-container:not(:first-child) {
            margin-top: 8px
        }

        .register-form__input {
            background-color: #fff;
            border: 1px solid #cacdce;
            box-shadow: none;
            color: #313435;
            font-size: .875rem;
            height: 44px;
            letter-spacing: -.025em;
            line-height: 1.1428571429em;
            padding: 12px 16px;
            width: 100%
        }

        .register-form__error {
            color: #bf2b2d;
            flex: 1 1 100%;
            font-size: .5625rem;
            font-style: italic;
            line-height: 1.7777777778em;
            margin-bottom: 4px
        }

        @media (min-width:767px) {
            .register-form__error {
                font-size: .75rem;
                line-height: 1.5em
            }
        }

        .register-form__approval {
            font-size: .625rem;
            letter-spacing: -.01em;
            margin-top: 12px;
            text-align: center
        }

        .register-form__approval a {
            color: #006aa8
        }

        .register-form__submit {
            align-items: center;
            display: flex;
            height: 45px;
            justify-content: center;
            margin-top: 16px;
            width: 100%
        }

        .register-form__switch-button {
            display: block;
            font-size: .625rem;
            letter-spacing: -.01em;
            line-height: 1.4em;
            margin-top: 16px
        }

        @media (min-width:767px) {
            .register-form__switch-button {
                margin-top: 12px
            }
        }

        .register-form__forgot-password {
            display: block;
            font-size: .625rem;
            letter-spacing: -.01em;
            line-height: 1.4em;
            margin-top: 8px;
            text-align: end
        }

        .register-form__password-icon {
            background-color: #62686a;
            height: 24px;
            position: absolute;
            right: 12px;
            top: 10px;
            width: 24px
        }

        .landing-info {
            grid-gap: 4px;
            align-items: center;
            border-radius: 8px;
            color: #181a1b;
            display: flex;
            grid-area: landing-info;
            margin: 16px auto 0;
            max-width: 940px;
            padding: 16px;
            width: 100%
        }

        @media (min-width:767px) {
            .landing-info {
                margin-top: 64px
            }
        }

        .landing-info--green {
            background-color: #bddff7
        }

        .landing-info__image {
            height: 66px;
            margin-left: auto;
            min-width: 66px
        }

        .landing-info__header {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.5em
        }

        .landing-info__text {
            font-size: 1rem;
            line-height: 1.5em;
            margin-top: 2px
        }

        .landing-register {
            grid-gap: 32px 64px;
            align-items: center;
            color: #181a1b;
            display: grid;
            grid-template: "landing-info" "benefits" "form";
            grid-template-columns: minmax(auto, 500px);
            justify-content: center;
            margin-bottom: 16px;
            max-width: 921px
        }

        @media (min-width:767px) {
            .landing-register {
                grid-gap: 24px 64px;
                grid-template: "landing-info landing-info" "benefits form";
                grid-template-columns: minmax(250px, auto) minmax(300px, 460px);
                margin-bottom: 64px
            }
        }

        .addon-benefits {
            grid-area: benefits
        }

        .addon-benefits__header {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.5em
        }

        .addon-benefits__list {
            margin-top: 16px
        }

        .addon-benefits__list-item {
            display: flex
        }

        .addon-benefits__list-item:not(:first-child) {
            margin-top: 8px
        }

        .addon-benefits__icon {
            height: 24px;
            min-width: 24px;
            padding: 7px 5px
        }

        .addon-benefits__img {
            box-shadow: 0 18px 28px -4px #181a1b3d;
            display: block;
            margin: 16px auto 0;
            width: 280px
        }

        @media (min-width:767px) {
            .addon-benefits__img {
                margin: 16px 0 0
            }
        }

        .register-box {
            background-color: #fff;
            border: 1px solid #1DC6FE;
            border-radius: 8px;
            box-shadow: 0 24px 40px -4px #9bd1ff;
            grid-area: form;
            max-width: 460px;
            min-height: 439px;
            padding: 32px;
            text-align: center;
            width: 100%
        }

        @media (max-width:766px) {
            .register-box {
                margin-top: 32px
            }
        }

        .register-box__top-caption {
            font-size: 1rem;
            line-height: 1.5em
        }

        .register-box__header {
            color: #181a1b;
            font-size: 1.25rem;
            line-height: 1.5em;
            margin-top: 4px
        }

        .register-box__form {
            margin-top: 24px
        }

        .popular__grid {
            grid-gap: 24px 16px;
            align-items: center;
            display: grid;
            grid-auto-rows: 1fr;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            justify-content: center;
            justify-items: center
        }

        @media (min-width:480px) {
            .popular__grid {
                grid-template-columns: repeat(3, minmax(0, 1fr))
            }
        }

        @media (min-width:767px) {
            .popular__grid {
                grid-gap: 16px;
                grid-template-columns: repeat(4, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .popular__grid {
                grid-template-columns: repeat(5, minmax(0, 1fr))
            }
        }

        @media (min-width:1279px) {
            .popular__grid {
                grid-template-columns: repeat(6, minmax(0, 1fr))
            }
        }
    </style>
</head>


<script src="{{URL::to('/public')}}/web_assets/js/app.js"></script>

<body style=" font-family: Arial, Helvetica, sans-serif;">
    <nav class="navbar page__section ">
        <div class="container--flex navbar__container">
            <div class="logo navbar__logo"><a class="logo__link" href="https://dealsandcouponsmena.ae/" aria-label="DCM" title="DCM">
                    <picture><img class="logo__image" src="https://dealsandcouponsmena.ae/public/web_assets/images/logo/m-logo.png" alt="DCM" loading="eager" height="38" width="106"></picture>
                </a></div>
        </div>
    </nav>
    <div class="landing-register container--flex">
        <div class="landing-info landing-info--green">
            <div><strong class="landing-info__header">Good job!</strong>
                <p class="landing-info__text">Register now to use DCM Extension !</p>
            </div><img class="landing-info__image" src="https://dealsandcouponsmena.ae/public/web_assets/images/icons/success.svg" alt="Good job!">
        </div>
        <div class="addon-benefits">
            <div class="addon-benefits__content"><strong class="addon-benefits__header">With the DCM extension you
                    will
                    gain:</strong>
                <ul class="addon-benefits__list">
                    <li class="addon-benefits__list-item"><img class="addon-benefits__icon" src="https://dealsandcouponsmena.ae/public/web_assets/images/icons/check-icon.svg" alt=""><span><span class="g--highlight">Cashback</span> for your online purchases.</span>
                    </li>
                    <li class="addon-benefits__list-item"><img class="addon-benefits__icon" src="https://dealsandcouponsmena.ae/public/web_assets/images/icons/check-icon.svg" alt=""><span>Automatic search and
                            use of the best codes in your shopping basket.</span></li>
                    <p></p>
                </ul>

                <img class="addon-benefits__img img--responsive" style="width: 65%; height: 65%" src="https://dealsandcouponsmena.ae/public/web_assets/images/logo/dcm_ext.png" alt="With the DCM extension you will gain:">

            </div>
        </div>
        <div class="register-box" id="sign_up">

            @if(session('login_faulier'))
            <div class="col-lg-4" style="padding: 20px;border-radius:10px;background-color:#FF7074;">
                <span class="text-center" style="font-size: 17px;color:#fff;">Login Error. wrong email, password.</b>
            </div>
            @endif
            @if(session('register_faulier'))
            <div class="col-lg-4" style="padding: 20px;border-radius:10px;background-color:#FF7074;">
                <span class="text-center" style="font-size: 17px;color:#fff;">Registration Error. exist user or not valid information.</b>
            </div>
            @endif

            
            <div class="register-box__inner-container" id="register-box">

                <h1 class="register-box__header">Create a DCM account</h1>
                <div class="register-box__form">

                    <div class="register-form register-form--active">

                        <div class="register-form__social-container register-form__social-container--icons-only">
                            <p>
                                <a href="{{route('auth.google', [$region])}}"><i class="fa fa-google-plus-square" style="font-size:48px;color:#ea4335;"></i></a>
                            </p>
                        </div>

                        <div class="register-form__delimiter">
                            <span class="register-form__delimiter-text">OR</span>
                        </div>

                        <form class="register-form__form register-form__form-register" id="create_user_form_ext" action="{{route('user.create_from_ext', [$region])}}" method="POST">
                            @csrf
                            <div class="register-form__input-container">
                                <input type="text" class="register-form__input" placeholder="Name" name="name" required="required">
                            </div>

                            <div class="register-form__input-container">
                                <input type="email" class="register-form__input" placeholder="Email" name="email" required="required">
                            </div>

                            <div class="register-form__input-container">
                                <input type="password" class="register-form__input register-form__input--password" placeholder="Password" name="password" required="required">
                            </div>

                            <div class="register-form__approval">
                                By registering, you confirm that you have read and accepted the "<a href="https://dealsandcouponsmena.com/en/dubai/terms" class="link" target="_blank">Terms
                                    &amp; Conditions</a>” and the "<a href="https://dealsandcouponsmena.com/en/dubai/privacy-policy" class="link" target="_blank">Privacy Policy.</a>"
                            </div>
                            <button type="submit" class="register-form__submit btn btn--blue" style="color: #fff;">Register &amp; Earn</button>
                        </form>

                        <span class="register-form__switch-button">Already have a DCM account? <a href="#sign_in" class="link"><b style="font-weight: 800;">Sign in</b></a></span>


                    </div>


                </div>
            </div>
        </div>

        <div class="register-box" id="sign_in" style="display: none;">

            <div class="register-box__inner-container" id="login-box">

                <h1 class="register-box__header">Login with your account</h1>
                <div class="register-box__form">

                    <div class="register-form register-form--active">

                        <div class="register-form__social-container register-form__social-container--icons-only">
                            <p>
                                <a href="{{route('auth.google', [$region])}}"><i class="fa fa-google-plus-square" style="font-size:48px;color:#ea4335;"></i></a>
                            </p>
                        </div>

                        <div class="register-form__delimiter">
                            <span class="register-form__delimiter-text">OR</span>
                        </div>

                        <form class="register-form__form register-form__form-register" action="{{route('user.login_from_ext', [$region])}}" method="POST">
                            @csrf


                            <div class="register-form__input-container">
                                <input type="email" class="register-form__input" placeholder="Email" name="email" required="required">
                            </div>

                            <div class="register-form__input-container">
                                <input type="password" class="register-form__input register-form__input--password" placeholder="Password" name="password" required="required">
                            </div>


                            <button type="submit" class="register-form__submit btn btn--blue" style="color: #fff;">Login</button>
                        </form>
                        <span class="register-form__switch-button">Don’t have DCM account yet? <a href="#sign_up" class="link"><b style="font-weight: 800;">Sign Up</b></a></span>



                    </div>

                </div>
            </div>
        </div>

    </div>
    <footer class="footer page__section">
        <div class="footer__container container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="small text-muted">
                        © 2024 <a href="https://www.dealsandcouponsmena.com/" target="_blank"><b style="color: #1caae2;">DCM</b></a>. All rights reserved | Powered By
                        <a href="https://daralafkarmarketingllc.com/" target="_blank"> <b style="color: #1caae2;">Dar Alafkar Marketing L.L.C</b></a>
                    </span>
                </div>
            </div>
        </div>

        <script>
            var signInLink = document.querySelector('.register-form__switch-button a[href="#sign_in"]');
            var signUpLink = document.querySelector('.register-form__switch-button a[href="#sign_up"]');

            signInLink.addEventListener('click', function(event) {
                event.preventDefault(); //

                var signInDiv = document.getElementById('sign_in');
                var signUpDiv = document.getElementById('sign_up');

                signInDiv.style.display = 'block';
                signUpDiv.style.display = 'none';

            });

            signUpLink.addEventListener('click', function(event) {
                event.preventDefault(); //

                var signInDiv = document.getElementById('sign_in');
                var signUpDiv = document.getElementById('sign_up');

                signUpDiv.style.display = 'block';
                signInDiv.style.display = 'none';
            });
        </script>
    </footer>
</body>

</html>