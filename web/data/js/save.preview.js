const video = document.getElementById('videoSource');
const canvas = document.getElementById('previewCanvas');
const videoUuid = video.dataset.uuid;

video.onloadedmetadata = function() {
    
    video.currentTime = 5.0;

    video.onseeked = function() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0);

        async function CreatePreview() {
            try {
                const duration = Math.round(video.duration * 1000);
                const base64Image = canvas.toDataURL('image/jpeg', 0.85);
                const formData = new FormData();
                formData.append('duration_ms', duration);
                formData.append('preview', base64Image); // отправляем как base64                
                const response = await fetch(`/panel/video/save-preview?video_uuid=${videoUuid}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        // 'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });
                const result = await response.json();
                console.log('Success:', result);

            } catch (error) {
                console.error('Error:', error);
            }            
        }

        CreatePreview();






        // canvas.toBlob(async function(blob) {
        //     const formData = new FormData();
        //     formData.append('duration_ms', duration);
        //     formData.append('imageBlob', blob);
        //     try {
        //         const response = await fetch(`/panel/video/save-preview?video_uuid=${videoUuid}`, {
        //             method: 'POST',
        //             headers: {
        //                 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        //                 // 'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
        //             },
        //             body: formData
        //         });
        //         const result = await response.json();
        //         console.log('Success:', result);

        //     } catch (error) {
        //         console.error('Error:', error);
        //     }
        // }, 'image/jpeg', 0.85);
    }
}