/**
 * Created by Kimia on 3/11/2017.
 */

// ellipsis

function ellipsizeTextBox(id) {
    var el = document.getElementsByClassName(id)[0];
    var wordArray = el.innerHTML.split(' ', 70);
    while(el.scrollHeight > el.offsetHeight) {
        wordArray.pop();
        el.innerHTML = wordArray.join(' ') + '...';
    }
}
ellipsizeTextBox("description");

// end of ellipsis

// pricing hover

// $('.pricing-table').hover(
//     function(){ $(this).addClass('active') },
//     function(){ $(this).removeClass('active') }
// );

// $(".grid-col-4").mouseenter(function() {
//     $(this).addClass('hover');
//     alert("$('#test').attr('class')");
//     alert("heeeelp");
// });
$(".pricing-table").mouseleave(function() {
    $(this).removeClass('hover');
});

// $(".pricing-table").hover(function () {
//     $(this).toggleClass("active");
// });

// end of pricing hover