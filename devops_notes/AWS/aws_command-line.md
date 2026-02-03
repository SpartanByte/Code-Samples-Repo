# Amazon Web Services
![AWS Amazon Web Servicesa](/images/aws-logo.png "DDL Databases")

### AWS CLI Configuration with an API Key

##### Generating your access keys

1. Go to the AWS Management Console.
2. Click on your user name or account name in the top right corner, and select Security credentials (or go directly to the IAM console).
3. Navigate to the Access keys section.
4. Click Create access key.
5. Follow the prompts. AWS will display the Access Key ID and the Secret Access Key. Crucially, this is the only time you will see the Secret Access Key, so copy it immediately and store it securely.

##### Configuring the AWS CLI
Once you have the keys, open the terminal/command prompt and run
`aws configure`

| Prompt | What to Enter | Example |
| :--- | :--- | :--- |
| AWS Access Key ID | The public part of your key (e.g., AKIAIOSFODNN7EXAMPLE) | AKIAIOSFODNN7EXAMPLE |
| AWS Secret Access Key | The secret part of your key (e.g., wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY) | wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY |
| Default region name | The region you want to use by default (e.g., us-east-1, eu-west-2) | us-east-1 |
| Default output format | The desired format for command output (e.g., json, text, table) | json |

The keys are stored in a file name `credentials` (usually located at `~/.aws/credentials` on Linux/macOS or `%USERPROFILE%\.aws\credentials` on Windows)
The default region and output format are stored in the config file.

##### Verify the Configuration
Run in the terminal/command line:
`aws sts get-caller-identity`