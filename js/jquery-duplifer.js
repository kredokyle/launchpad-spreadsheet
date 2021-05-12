(function ($) {
	$.fn.duplifer = function (options)
	{
		var settings = $.extend({
			colorGenerator: function (index)
			{
				// http://stackoverflow.com/a/12266311
				return '#FB5252';
						
				// or return the color in the array at "index"
				// var colors = ["red", "orange", "yellow", "green", "blue", "indigo", "violet"];
				// return colors[index];
			},
			highlightClass: "duplifer-highlightdups"
		}, options);

		// find index of td whose th has the class defined by dup_class
		// select all tds that have that index and put into an array
		var cell_index = this.find("thead tr").find("th." + settings.highlightClass).index();
		var row_tds = $("tr td:nth-child(" + (cell_index + 1) + ")")
		var row_values = row_tds.map(function () {
				return $(this).html();
			}).get();

		// now find values that are in the array more than once.
		// it's a duplicate if lastIndexOf(value) == current row && indexOf(value) != current_row
		// http://stackoverflow.com/a/8315486
		var duplicates = row_values.filter(function (value, index) {
				return row_values.lastIndexOf(value) == index && row_values.indexOf(value) != index;
			});

		// for each value in the duplicates array, find all rows that have that value
		// and apply corresponding color from color array as well as 'duplifer-highlighted' class
		$(duplicates).each(function (duplicates_index) {
			row_tds.filter(function () {
				return $(this).html() == duplicates[duplicates_index];
			}).css("background-color", settings.colorGenerator(duplicates_index)).addClass("duplifer-highlighted");
		});
	};
})(jQuery);
