# PHPEmailer
subscribers.txt - a list of people subscribed to our newsletter
unsubscribed.txt - a list of people who have unsubscribed
bounced.txt - a list of addresses which have bounced in the past

Each file is plain text and contains one email address per line.

The program should consider the list of subscribers and remove anyone who
has unsubscribed or bounced, since we don't want to send the newsletter to
them.  It should then output a list of the people who will receive the
email.
