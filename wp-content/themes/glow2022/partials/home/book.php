
    <div class="home-book grey-panel magnet-left">
        <div class="col-left">
            <h2>Get a free copy of Mitch's book</h2>
            <p>"Two pages in and I'm hooked. This is a wonderful book - accessible, wise, witty and more profound that you might imagine. A modern day (acerbic) Aesop's Fables for recruiters." - <strong>Hung Lee, Recruiting Brainfood</strong></p>
        </div>
        <div class="col-right">
            <?php $bookId = get_field('book_image_id', 'options');?>
            <?php echo wp_get_attachment_image( $bookId, 'medium' ); ?> 
            <a href="/mitch-book/" class="btn-full btn-right">Download</a>
        </div>
    </div>
