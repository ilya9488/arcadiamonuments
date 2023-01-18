// copy in modal window
$(document).on('click', '#copyText', function (e){
    e.preventDefault();
    const href = $(this).attr('href');
    const elem = document.createElement('textarea');
    elem.value = href;
    document.body.appendChild(elem);
    elem.select();
    console.log('href', href);
    document.execCommand('copy');
    document.body.removeChild(elem);
})