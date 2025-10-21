@extends('layouts.app')

@section('title', 'Pendaftaran Seller | E-commerce Kerajinan Lokal')

@section('styles')
    <style>
        :root {
            --primary-color: #A9684C;
            --background-color: #F8F4E9;
            --button-dark: #8B4513;
            --button-green: #4CAF50;
            --text-color: #333;
            --border-color: #ccc;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            display: flex;
            margin: 0;
            padding: 0;
        }

        /* Sidebar Navigation */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background-color: var(--background-color);
            border-right: 2px solid var(--primary-color);
            padding: 20px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            text-align: left;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--primary-color);
        }

        .sidebar-header h2 {
            color: var(--button-dark);
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            line-height: 1.3;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 15px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: var(--text-color);
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(169, 104, 76, 0.2);
        }

        /* Main Content Area */
        .main-content {
            margin-left: 280px;
            padding: 40px;
            width: calc(100% - 280px);
        }

        /* Top Navigation */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
        }

        .nav-left {
            display: flex;
            gap: 30px;
        }

        .nav-left a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            display: flex;
            align-items: center;
            border: 2px solid var(--border-color);
            border-radius: 25px;
            padding: 8px 20px;
            background: white;
        }

        .search-box input {
            border: none;
            outline: none;
            padding: 5px;
            width: 300px;
            font-size: 14px;
        }

        .icon-button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
        }

        /* Form Container */
        .form-container {
            display: flex;
            gap: 50px;
        }

        /* Left Form Section */
        .form-left {
            flex: 1;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-color);
        }

        .form-header h2 {
            color: var(--text-color);
            font-size: 28px;
            margin: 0;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-color);
            font-size: 16px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .input-wrapper {
            position: relative;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
            padding-left: 15px;
        }

        /* Right Form Section */
        .form-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .info-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .info-box h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-color);
            font-size: 22px;
            margin-bottom: 20px;
        }

        select.form-control {
            appearance: none;
            background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E\");
            background-repeat: no-repeat;
            background-position: right 15px center;
            cursor: pointer;
            padding-left: 15px;
        }

        /* File Upload */
        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px;
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            background: var(--background-color);
        }

        .file-upload-label:hover {
            border-color: var(--primary-color);
            background: white;
        }

        input[type=\"file\"] {
            display: none;
        }

        /* Submit Button */
        .submit-button {
            width: 100%;
            padding: 15px;
            background-color: var(--button-green);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(76, 175, 80, 0.3);
        }

        .submit-button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(76, 175, 80, 0.4);
        }
    </style>
@endsection" --new-str "@extends('layouts.app')

@section('title', 'Pendaftaran Seller | E-commerce Kerajinan Lokal')

@section('styles')
    <style>
        :root {
            --primary-color: #A9684C;
            --background-color: #F8F4E9;
            --button-dark: #8B4513;
            --button-green: #4CAF50;
            --text-color: #333;
            --border-color: #ddd;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            display: flex;
        }

        /* Sidebar Navigation */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background-color: #F5EFD9;
            padding: 30px 20px;
        }

        .sidebar-title {
            color: #6B3410;
            font-size: 20px;
            font-weight: bold;
            line-height: 1.4;
            margin-bottom: 35px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar-menu a.active {
            background-color: rgba(169, 104, 76, 0.15);
        }

        .sidebar-menu a:hover {
            background-color: rgba(169, 104, 76, 0.1);
        }

        /* Main Content Area */
        .main-content {
            margin-left: 280px;
            padding: 30px 50px;
            width: calc(100% - 280px);
            min-height: 100vh;
        }

        /* Top Navigation - PERSIS SEPERTI GAMBAR */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
        }

        .nav-left {
            display: flex;
            gap: 40px;
        }

        .nav-left a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .icon-btn {
            background: none;
            border: none;
            font-size: 26px;
            cursor: pointer;
        }

        .search-container {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ddd;
            border-radius: 30px;
            padding: 8px 20px;
            gap: 10px;
        }

        .search-container input {
            border: none;
            outline: none;
            font-size: 14px;
            width: 250px;
        }

        /* Form Layout - 2 KOLOM SEPERTI GAMBAR */
        .form-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        /* Left Column - Form Pendaftaran Seller */
        .form-section {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #A9684C;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
        }

        .input-box {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px 12px 50px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #A9684C;
        }

        .form-textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            min-height: 120px;
            resize: vertical;
            font-family: Arial, sans-serif;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #A9684C;
        }

        /* Right Column - Info Boxes */
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .info-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 18px;
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            background: white;
            appearance: none;
            background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23333' d='M6 8L0 0h12z'/%3E%3C/svg%3E\");
            background-repeat: no-repeat;
            background-position: right 15px center;
        }

        .form-select:focus {
            outline: none;
            border-color: #A9684C;
        }

        /* File Upload - SEPERTI GAMBAR */
        .file-upload {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            cursor: pointer;
            background: #fafafa;
            transition: all 0.3s;
        }

        .file-upload:hover {
            border-color: #A9684C;
            background: #fff;
        }

        .file-upload input {
            display: none;
        }

        /* Submit Button - HIJAU SEPERTI GAMBAR */
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        /* Error Message */
        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
@endsection
