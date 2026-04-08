# Brian Wardwell
# This program converts images from JPEG to PNG format.
# OS Agnostic, uses pathlib for path handling and Pillow for image processing.
# This script is great for uniformly converting images.  

# You will need to install Pillow if you haven't already:
# pip install Pillow

from pathlib import Path
from PIL import Image

# Setup universal path
folder = Path.home() / "Desktop" / "Project"

if folder.exists():
    for file_path in folder.iterdir():
        # Target only .jpg or .jpeg files
        if file_path.suffix.lower() in [".jpg", ".jpeg"]:
            
            # 1. Open the image
            with Image.open(file_path) as img:
                
                # Create the new filename (swap .jpg for .png)
                new_path = file_path.with_suffix(".png")
                
                # Note: Pillow handles the conversion automatically based on the extension
                img.save(new_path, "PNG")
                
                print(f"Converted: {file_path.name} -> {new_path.name}")

            # 4. Optional: Remove the original .jpg file
            # file_path.unlink() 
else:
    print("Folder not found!")

# Hold the console open to review results
input("\nProcess complete! Press Enter to close...")

# TODO: Add support for user approval to remove original .jpg files after conversion.
# file_path.unlink() 