<!DOCTYPE html>
<html>
<head>
    <title>Loading...</title>
    <style>
        body { 
            margin: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #ffffff;
        }
        .loader {
            width: 80px;
            height: 80px;
            border: 8px solid #ddd;
            border-top: 8px solid #c09f33;
            border-radius: 50%;
            animation: spin 1s infinite linear;
        }
        @keyframes spin {
            100% { transform: rotate(360deg); }
        }
    </style>
    <link rel="icon" href="<?= base_url('mandala_icon.png') ?>" />
</head>
<body>
    <div class="loader"></div>

<script>
setTimeout(() => {
    window.location.href = "<?php echo site_url('landing'); ?>";
}, 2000);
</script>

</body>
</html>