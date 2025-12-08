### Docker Snippets, Notes and Commands
![Docker Logo](/images/docker-logo.png "Docker Container Management")

**To get to a shell (VM) in a Docker container**:
`docker compose exec app bash`
This will show something like this if successful: `root@f7b06d9279c2:/var/www/html# `

**In some cases, a "Failed to remove directory" will show when trying to run `php bin/console make:migration`, if so, then run:**
`rm -rf /var/www/html/var/cache/dev/`