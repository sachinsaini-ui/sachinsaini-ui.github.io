document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];
    const formData = new FormData();
    formData.append('file', file);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php', true);

    xhr.upload.onprogress = function(event) {
        if (event.lengthComputable) {
            const percentComplete = (event.loaded / event.total) * 100;
            document.getElementById('progressWrapper').style.display = 'block';
            document.getElementById('uploadProgress').textContent = percentComplete.toFixed(2) + '%';
        }
    };

    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            document.getElementById('progressWrapper').style.display = 'none';
            document.getElementById('resultWrapper').style.display = 'block';
            const fileUrl = `https://rahultech.me/uploads/${response.fileName}`;
            document.getElementById('fileUrl').href = fileUrl;
            document.getElementById('fileUrl').textContent = fileUrl;
        } else {
            alert('Upload failed. Please try again.');
        }
    };

    xhr.send(formData);
});
