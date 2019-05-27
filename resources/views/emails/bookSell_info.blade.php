<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookTheBook Information</title>
</head>
<body>
    <p>
        Thank you {{ ucfirst($user->name) }} for contacting our support team. Your selling book has been posted. You will be notified when a response is made by email. The details of your book posted are shown below:
    </p>

    <p>Category: {{ $bookSell->category }}</p>
    <p>Subject: {{ $bookSell->subject }}</p>
    <p>Title: {{ $bookSell->title }}</p>
    <p>Author: {{ $bookSell->author }}</p>
    <p>Publisher: {{ $bookSell->publisher }}</p>
    <p>Published Year: {{ $bookSell->year }}</p>
    <p>ISBN: {{ $bookSell->isbn }}</p>
    <p>Price: {{ $bookSell->price }}</p>
    <p>Status: {{ $bookSell->status }}</p>

    <p>
        You can view the book at any time at {{ url('$bookSell/'. $bookSell->bookSell_id) }}
    </p>

</body>
</html>