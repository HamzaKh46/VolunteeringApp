<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <script async defer src="https://embeds.every.org/0.4/button.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundraiser Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .fundraiser-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #fafafa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .fundraiser-card h2 {
            color: #333;
        }

        .fundraiser-card p {
            color: #666;
            font-size: 14px;
        }

        .fundraiser-card .goal {
            font-weight: bold;
            color: #4CAF50;
        }

        .fundraiser-card .raised {
            font-size: 18px;
            color: #FF5733;
        }

        .supporters {
            font-size: 16px;
            color: #FF5733;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Fundraiser Details</h1>

    @if($fundraiser)
    <div class="card mb-4">
        <img src="https://res.cloudinary.com/everydotorg/image/upload/f_auto,c_limit,w_500/{{ $fundraiser['data']['fundraiser']['coverImageCloudinaryId'] }}" alt="Fundraiser Image" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ $fundraiser['data']['fundraiser']['title'] }}</h5>
            <p class="card-text">{{ $fundraiser['data']['fundraiser']['description'] }}</p>
            <p class="card-text"><strong>Amount Raised:</strong> ${{ number_format($raised/ 100, 2) }}</p>
            @if($goalAmount !== null && $goalAmount > 0)
                <p class="card-text"><strong>Fundraiser Goal:</strong> ${{ number_format($goalAmount / 100, 2) }}</p>
            @else
                <p class="card-text"><strong>Fundraiser Goal:</strong> No specific goal set</p>
            @endif
            <p class="supporters"><strong>Supporters Count:</strong> {{ $supporters }}</p>
            <a data-every-style href="https://www.every.org/lilbubsbigfund#/donate">Donate</a>
        </div>
    </div>
    @else
        <p>No details found for this fundraiser.</p>
    @endif  
</div>

</body>
</html>
