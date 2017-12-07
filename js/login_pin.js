'use strict';

(function () {
	var input = '',
	    correct = '5555';

	var dots = document.getElementsByClassName('dot'),
	    numbers = document.getElementsByClassName('number');
	dots = Array.from(dots);
	numbers = Array.from(numbers);
	console.log(document.getElementsByClassName('number'));
	var numbersBox = document.getElementsByClassName('numbers')[0];

	$(numbersBox).on('click', '.number', function (evt) {
		var number = $(this);

		number.addClass('grow');
		input += number.context.innerHTML;

		console.log(input);
		$(dots[input.length - 1]).addClass('active');

		if (input.length >= 4) {
			if (input !== correct) {
				dots.forEach(function (dot) {
					return $(dot).addClass('wrong');
				});
				$(document.body).addClass('wrong');
			} else {
				dots.forEach(function (dot) {
					return $(dot).addClass('correct');
				});
				$(document.body).addClass('correct');
			}
			setTimeout(function () {
				dots.forEach(function (dot) {
					return dot.className = 'dot';
				});
				input = '';
			}, 900);
			setTimeout(function () {
				document.body.className = '';
			}, 1000);
		}
		setTimeout(function () {
			number.className = 'number';
		}, 1000);
	});
})();