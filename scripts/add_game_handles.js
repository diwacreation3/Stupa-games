
      // Function to count words in the game description
      function countWords() {
        const gameDescription = document.getElementById('gameDescription').value;
        const wordCount = gameDescription.trim().split(/\s+/).length;
        const wordCountElement = document.getElementById('wordCount');
        wordCountElement.textContent = `Word Count: ${wordCount}/60`;
        
        // Check if word count exceeds 60
        if (wordCount > 60) {
            wordCountElement.classList.add('overlimit'); // Add red color
            document.getElementById('gameDescription').value = gameDescription.split(/\s+/).slice(0, 60).join(' '); // Truncate text to 60 words
        } else {
            wordCountElement.classList.remove('overlimit'); // Remove red color
        }
    }

    // Update word count on input change
    document.getElementById('gameDescription').addEventListener('input', countWords);

    // Banner Image Drop Area
    const bannerImageDropArea = document.getElementById('bannerImageDropArea');
    const bannerImageInput = document.getElementById('bannerImage');
    const bannerImagePreview = document.getElementById('bannerImagePreview');

    bannerImageDropArea.addEventListener('click', () => bannerImageInput.click());

    bannerImageDropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        bannerImageDropArea.classList.add('dragover');
    });

    bannerImageDropArea.addEventListener('dragleave', () => {
        bannerImageDropArea.classList.remove('dragover');
    });

    bannerImageDropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        bannerImageDropArea.classList.remove('dragover');
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            bannerImageInput.files = files;
            previewBannerImage(files[0]);
        }
    });

    bannerImageInput.addEventListener('change', (event) => {
        const files = event.target.files;
        if (files.length > 0) {
            previewBannerImage(files[0]);
        }
    });

    function previewBannerImage(file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            bannerImagePreview.src = event.target.result;
            bannerImagePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    // Binary File Drop Area
    const binaryFileDropArea = document.getElementById('binaryFileDropArea');
    const binaryFileInput = document.getElementById('binaryFile');
    const filePreview = document.getElementById('filePreview');
    const fileIcon = document.getElementById('fileIcon');
    const fileName = document.getElementById('fileName');

    binaryFileDropArea.addEventListener('click', () => binaryFileInput.click());

    binaryFileDropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        binaryFileDropArea.classList.add('dragover');
    });

    binaryFileDropArea.addEventListener('dragleave', () => {
        binaryFileDropArea.classList.remove('dragover');
    });

    binaryFileDropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        binaryFileDropArea.classList.remove('dragover');
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            binaryFileInput.files = files;
            setFileIcon(files[0]);
        }
    });

    binaryFileInput.addEventListener('change', (event) => {
        const files = event.target.files;
        if (files.length > 0) {
            setFileIcon(files[0]);
        }
    });

    function setFileIcon(file) {
        const extension = file.name.split('.').pop().toLowerCase();
        switch (extension) {
            case 'apk':
                fileIcon.className = 'bi bi-android';
                break;
            case 'exe':
            case 'msi':    
                fileIcon.className = 'bi bi-windows';
                break;
            case 'html':
            case 'htm':
            case 'web':
                fileIcon.className = 'bi bi-globe';
                break;
            case 'zip':
              fileIcon.className = 'bi bi-file-earmark-zip' ;
              break;  
            default:
                fileIcon.className = 'bi bi-file-alt';
        }
        fileName.textContent = file.name;
        filePreview.style.display = 'flex';
    }
