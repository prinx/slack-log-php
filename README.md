# Simple log-to-Slack util

## Installation

```shell
composer require prinx/slack-log
```

## Usage

First create a Slack [incoming webhook](google.com?q=create+slack+incoming+webhook).

In your `.env` file, at the root of your project, configure the webhook.

```ini
SLACK_LOG_WEBHOOK=https://hooks...

# Optional. True by default
SLACK_LOG_ENABLED=true
```

Then in your code, log:

```php
// PHP
use Prinx\SlackLog;

SlackLog::debug('✔️ User logged in.');
SlackLog::info('...');
SlackLog::notice('...');
SlackLog::warning('...');
SlackLog::error('...');
SlackLog::critical('...');
SlackLog::alert('...');
SlackLog::emergency('...');
```

## Contribute

- Star this repo
- Fork this repo
- Add a missing feature
- Create a pull request
- Receive the glory

## License

[MIT](LICENSE)
