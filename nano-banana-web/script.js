document.addEventListener('DOMContentLoaded', function() {
    const generateBtn = document.getElementById('generateBtn');
    const promptInput = document.getElementById('prompt');
    const loadingDiv = document.getElementById('loading');
    const resultDiv = document.getElementById('result');
    const errorDiv = document.getElementById('error');
    const generatedImage = document.getElementById('generatedImage');
    const displayPrompt = document.getElementById('displayPrompt');
    const timeTaken = document.getElementById('timeTaken');
    const downloadLink = document.getElementById('downloadLink');

    generateBtn.addEventListener('click', async function() {
        const prompt = promptInput.value.trim();
        
        if (!prompt) {
            showError('Please enter a prompt');
            return;
        }

        // Disable button and show loading
        generateBtn.disabled = true;
        loadingDiv.classList.remove('hidden');
        resultDiv.classList.add('hidden');
        errorDiv.classList.add('hidden');

        try {
            // API endpoint with parameters
            const apiUrl = 'https://gold-newt-367030.hostingersite.com/nano.php?' +
                          new URLSearchParams({
                              key: 'USAGIWK',
                              prompt: prompt
                          });

            const response = await fetch(apiUrl);
            
            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const data = await response.json();
            
            // Display results
            generatedImage.src = data.url;
            displayPrompt.textContent = data.prompt;
            timeTaken.textContent = data.time_taken;
            downloadLink.href = data.url;
            
            resultDiv.classList.remove('hidden');
        } catch (err) {
            showError('Failed to generate image: ' + err.message);
        } finally {
            // Re-enable button and hide loading
            generateBtn.disabled = false;
            loadingDiv.classList.add('hidden');
        }
    });

    function showError(message) {
        errorDiv.textContent = message;
        errorDiv.classList.remove('hidden');
    }
});