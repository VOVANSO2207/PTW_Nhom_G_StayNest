// POST.BLADE.PHP - View - Modal Post
document.addEventListener('DOMContentLoaded', function() {
    const postDetailRows = document.querySelectorAll('.post-detail');

    postDetailRows.forEach(row => {
        row.addEventListener('click', function() {
            const postId = this.getAttribute('data-id'); 
            console.log(`/posts/${postId}/detail`);

            // Gọi AJAX để lấy thông tin chi tiết bài viết
            fetch(`/posts/${postId}/detail`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(post => {

                    // Hàm để giới hạn ký tự và thêm "..." nếu cần
                    const limitText = (text, maxLength = 10) => {
                        return text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
                    };

                    document.getElementById('modalTitle').innerText = limitText(post.title);
                    document.getElementById('modalDescription').innerText = limitText(post.description);
                    document.getElementById('modalContent').innerText = limitText(post.content);
                    document.getElementById('modalMetaDesc').innerText = limitText(post.meta_desc);
                    document.getElementById('modalUrlSeo').innerText = limitText(post.url_seo);
                    document.getElementById('modalStatus').innerText = post.status ? 'Show' : 'Hidden';

                    // Cập nhật hình ảnh
                    const imageUrl = post.img ? `/images/${post.img}` : '/path/to/default/image.jpg';
                    document.getElementById('modalImage').src = imageUrl;


                    // Hiển thị modal
                    const modal = new bootstrap.Modal(document.getElementById('postDetailModal'));
                    modal.show();
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        });
    });
});

// POST_ADD.BLADE.PHP - ADD POST
