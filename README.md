# Simple log-to-Slack util

## Installation

```shell
composer require prinx/slack-log
```

## Usage

```php
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

## License

[MIT](LICENSE)
