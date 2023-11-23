
<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        
        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .profile-email {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        
        .profile-bio {
            font-size: 18px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="{{ $profilePicture }}" alt="Profile Picture" class="profile-picture">
        <h1 class="profile-name">{{ $name }}</h1>
        <p class="profile-email">{{ $email }}</p>
        <p class="profile-bio">{{ $bio }}</p>
    </div>
</body>
</html>
