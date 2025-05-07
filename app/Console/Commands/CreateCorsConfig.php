<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateCorsConfig extends Command
{
    protected $signature = 'make:cors-config';
    protected $description = 'Create a custom CORS config file';

    public function handle()
    {
        $config = <<<'EOD'
<?php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
EOD;
        File::put(config_path('cors.php'), $config);
        $this->info('CORS config file created successfully!');
    }
}