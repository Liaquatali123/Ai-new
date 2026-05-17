# Nano Banana Image Generator

A web application for generating images using the Nano Banana PRO API.

## Features

- Clean, modern UI
- Responsive design
- Image generation with custom prompts
- Loading state during generation
- Display of generated image with metadata
- Download functionality
- Error handling

## API Used

This application uses the Nano Banana PRO API:
- Endpoint: `https://gold-newt-367030.hostingersite.com/nano.php`
- Parameters: `key` (USAGIWK) and `prompt` (user input)
- Returns: Image URL, original prompt, and generation time

## Deployment

### Vercel Deployment (Recommended)

1. Push this repository to GitHub
2. Import the project in Vercel
3. Vercel will automatically detect the static site and deploy it
4. No configuration needed - the site will be deployed as-is

### Manual Deployment

1. Copy the contents of the `nano-banana-web` directory to your web server
2. Ensure all files (index.html, style.css, script.js) are uploaded
3. The application will work immediately

## Local Development

1. Clone or download this repository
2. Open `nano-banana-web/index.html` in your web browser
3. No build step or dependencies required

## Usage

1. Enter your image description in the textarea
2. Click "Generate Image"
3. Wait for the image to generate (typically 40-50 seconds)
4. View the result and download if desired

## File Structure

```
nano-banana-web/
├── index.html     # Main HTML structure
├── style.css      # Styling and responsive design
└── script.js      # Application logic and API integration
```

## Browser Support

Works in all modern browsers:
- Chrome
- Firefox
- Safari
- Edge
- Mobile browsers

## Notes

- The API key (USAGIWK) is embedded in the frontend for simplicity
- For production use with sensitive keys, consider implementing a backend proxy
- Image generation time varies based on prompt complexity and server load

---

Generated with ❤️ for the Nano Banana PRO API