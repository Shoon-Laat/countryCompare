window.addEventListener('load', function () {
	const loader = document.getElementById('page-loader');
	const data = [
		document.getElementById('banner'),
		document.getElementById('mapComparator'),
		document.getElementById('colophon')
	];
	loader.classList.add('fade-out');
	loader.addEventListener('transitionend', function() {
        loader.style.display = "none";
        const elements = document.querySelectorAll('.custom-bottom-medium');
        const rightElements = document.querySelectorAll('.custom-right-medium');
        const leftElements = document.querySelectorAll('.custom-left-medium');
        const topElements = document.querySelectorAll(".custom-top-medium");

        elements.forEach(el => el.classList.add('fade-in'));
        rightElements.forEach(el => el.classList.add('fade-in'));
        leftElements.forEach(el => el.classList.add('fade-in'));
        topElements.forEach(el => el.classList.add('fade-in'));
        setTimeout(function() {
			data.forEach(element => {
				if (element) {
					element.style.opacity = "1"; // Set opacity for each element
				}
			});
            elements.forEach(el => el.classList.add('show', 'uk-animation-slide-bottom-medium'));
            rightElements.forEach(el => el.classList.add('show', 'uk-animation-slide-right-medium'));
            leftElements.forEach(el => el.classList.add('show', 'uk-animation-slide-left-medium'));
            topElements.forEach(el => el.classList.add('show', 'uk-animation-slide-top'));
        }, 50); 
    });
	
});

document.querySelectorAll('.uk-nav a').forEach(link => {
	link.addEventListener('click', () => {
		UIkit.offcanvas('#offcanvas-usage').hide();
	});
});

const sbToggle = document.getElementById("sidebar-toggle");
const sb = document.getElementById("sidebar");
const sbSlim = document.getElementById("sidebar-slim");
const sbContainer = document.getElementById("sidebar-container");
const CLS = "uk-hidden";
const closeBtn = "closebtn";

adjustWidth();

sbToggle.addEventListener("click", function () {
	sb.classList.toggle(CLS);
	sbSlim.classList.toggle(CLS);
	sbToggle.classList.toggle(closeBtn);

	if (sbToggle.classList.contains(closeBtn)) {
		sbToggle.setAttribute("uk-icon", "icon: close");
		sbToggle.classList.remove("uk-navbar-toggle-icon");
	} else {
		sbToggle.setAttribute("uk-icon", "icon: menu");
		sbToggle.classList.add("uk-navbar-toggle-icon");
	}
	UIkit.icon(sbToggle);
	adjustWidth();
});

function adjustWidth() {
	if (sb.classList.contains(CLS)) {
		sbContainer.style.width = "70px";
	} else if (sbSlim.classList.contains(CLS)) {
		sbContainer.style.width = "200px";
	}
	sbContainer.style.transition = "width 0.2s ease";
	window.dispatchEvent(new Event("resize"));
}

const mapContents = document.querySelectorAll(".map-content");
const compareData = document.getElementById("compareData");
let selectedCount = 0;
let selectedPostIds = [];
let selectedItems = [];
let startYear = null;
let endYear = null;
let startMonth = null;
let endMonth = null;
let countryImages = "";

const monthNames = [
	"Jul",
	"Aug",
	"Sep",
	"Oct",
	"Nov",
	"Dec",
	"Jan",
	"Feb",
	"Mar",
	"Apr",
	"May",
	"Jun",
];
const fullMonthNames = {
	Jul: "July",
	Aug: "August",
	Sep: "September",
	Oct: "October",
	Nov: "November",
	Dec: "December",
	Jan: "January",
	Feb: "February",
	Mar: "March",
	Apr: "April",
	May: "May",
	Jun: "June",
};

if (typeof countryData !== "undefined" && Array.isArray(countryData.images)) {
	countryImages = countryData.images;
}
// disable map if complete 2 map selected
function updateCompareButton() {
	const isTwoSelected = selectedCount === 2;
	mapContents.forEach((content) => {
		content.classList.toggle(
			"uk-disabled",
			isTwoSelected && !content.classList.contains("selected")
		);
	});
	compareData.classList.toggle("uk-active", isTwoSelected);
	compareData.classList.toggle("uk-disabled", !isTwoSelected);
	compareData.disabled = !isTwoSelected;
}

mapContents.forEach((mapContent) => {
	mapContent.addEventListener("click", function () {
		const index = selectedItems.indexOf(mapContent);
		if (index > -1) {
			mapContent.classList.remove("selectedFirst", "selectedSecond");
			selectedItems.splice(index, 1);
			if (index === 0 && selectedItems[0]) {
				selectedItems[0].classList.remove("selectedSecond");
				selectedItems[0].classList.add("selectedFirst");
			}
		} else {
			if (selectedItems.length < 2) {
				selectedItems.push(mapContent);
				if (selectedItems.length === 1) {
					mapContent.classList.add("selectedFirst");
				} else if (selectedItems.length === 2) {
					mapContent.classList.add("selectedSecond");
				}
			}
		}

		mapContent.classList.toggle("selected");
		selectedCount += mapContent.classList.contains("selected") ? 1 : -1;
		mapContent.id = mapContent.classList.contains("selected")
			? `selected-map-${index + 1}`
			: "";
		updateCompareButton();
	});
});

compareData.addEventListener("click", function () {
	if (compareData.classList.contains("uk-active")) {
		document.getElementById("dataContent").classList.remove("uk-hidden");
		selectedPostIds = getSelectedDataValues();
		const monthSelect = document.getElementById("monthSelect");
		const selectedMonthValue = monthSelect.value;

		const [start, end] = selectedMonthValue.split("-");
		startYear = start.substring(3);
		endYear = end.substring(3);

		const monthDisplayDiv = document.getElementById("monthDisplay");
		const lastMonthButton =
			monthDisplayDiv.lastElementChild?.querySelector("a");
		const allMonthButtons = monthDisplayDiv.querySelectorAll("div > a");
		allMonthButtons.forEach((button) => {
			button.classList.remove("uk-active");
		});
		if (lastMonthButton) {
			lastMonthButton.classList.add("uk-active");
			const selectedMonth = lastMonthButton
				.getAttribute("data-month")
				.toLowerCase();
			fetchDataFromWordPress(selectedPostIds, startYear, selectedMonth);

			const leftContent = document.getElementById("left-content");
			const leftContentMb = document.getElementById("left-content-mobile");
			const rightContent = document.getElementById("right-content");
			const rightContentMb = document.getElementById("right-content-mobile");

			leftContent.innerHTML = "";
			leftContentMb.innerHTML = "";
			rightContent.innerHTML = "";
			rightContentMb.innerHTML = "";
			createCountryImg(leftContent, selectedPostIds[0]);
			createCountryImgMb(
				leftContentMb,
				selectedPostIds[0],
				startYear,
				selectedMonth
			);
			createCountryImg(rightContent, selectedPostIds[1]);
			createCountryImgMb(
				rightContentMb,
				selectedPostIds[1],
				startYear,
				selectedMonth
			);

			document.getElementById("firstCountryMb").innerText =
				selectedPostIds[0].toLocaleUpperCase();
			document.getElementById("secondCountryMb").innerText =
				selectedPostIds[1].toLocaleUpperCase();
			document.getElementById("reportFirstBtn").innerText =
				"View " + selectedPostIds[0].toLocaleUpperCase() + " Report";
			document.getElementById("reportSecondBtn").innerText =
				"View " + selectedPostIds[1].toLocaleUpperCase() + " Report";

			disableSelectedCountry(selectedPostIds);
		}

		scrollToTradeData();
	}

	const countryComparator = document.getElementById("countryComparator");
	const customGradient = document.querySelector(".custom-gradient");
	countryComparator.style.zIndex = "1000";

	if (countryComparator.classList.contains("uk-hidden")) {
		countryComparator.classList.remove("uk-hidden", "uk-position-top");
		const customGradientHeight = customGradient.offsetHeight;
		countryComparator.style.top = `${customGradientHeight}px`;
	}
});

document.getElementById("monthSelect").addEventListener("change", function () {
	const selectedValue = this.value;
	const [start] = selectedValue.split("-");
	const year = start.substring(3);

	const [startMonthValue, endMonthValue] = selectedValue
		.split("-")
		.map((m) => m.trim());

	const startIndex = monthNames.indexOf(startMonthValue.substring(0, 3));
	const endIndex = monthNames.indexOf(endMonthValue.substring(0, 3));
	const range =
		endIndex >= startIndex
			? monthNames.slice(startIndex, endIndex + 1)
			: [...monthNames.slice(startIndex), ...monthNames.slice(0, endIndex + 1)];

	setMonthYear(range, year);

	setMonthDes(range);

	setMonthMb(range);
});
document.getElementById("monthSelect").dispatchEvent(new Event("change"));

// Fetch data from api and set the progress data for each trade
function fetchDataFromWordPress(selectedPostIds, startYear, selectedMonth) {
	const pageId = "8"; // Replace with your actual page ID
	const apiUrl = `http://localhost/project/dhl/wp-json/wp/v2/pages/${pageId}`;

	fetch(apiUrl)
	.then((response) => response.json())
	.then((data) => {
	// if (typeof my_custom_data !== "undefined") {
		const tradeDataDiv = document.getElementById("progressList");

		// if (data && data.custom_fields) {
		if (true) {
			let structuredData = {};
			let customFields = my_custom_data;

			// Structure the data
			for (const key in customFields) {
				if (customFields.hasOwnProperty(key)) {
					const value = customFields[key][0];
					const regexMatch = key.match(/trade_(\d{4})_(\w+?)_(\w+?)_/);
					if (regexMatch) {
						const [, year, month, country] = regexMatch;
						const fieldType = key.replace(
							`trade_${year}_${month}_${country}_`,
							""
						);
						structuredData[country] = structuredData[country] ?? {};
						structuredData[country][year] = structuredData[country][year] ?? {};
						structuredData[country][year][month] =
							structuredData[country][year][month] ?? {};
						structuredData[country][year][month][fieldType] = value;
					}
				}
			}

			const progressData = [];
			const firstData = [];
			const secondData = [];
			selectedPostIds.forEach((selectedCountry, index) => {
				if (structuredData[selectedCountry][startYear]) {
					const yearData = structuredData[selectedCountry][startYear];
					if (yearData[selectedMonth]) {
						const monthData = yearData[selectedMonth]; // Access the month data
						for (const fieldType in monthData) {
							if (index == 0) {
								firstData.push({
									label: fieldType,
									value: monthData[fieldType],
								});
							} else {
								secondData.push({
									label: fieldType,
									value: monthData[fieldType],
								});
							}
						}
					}
				}
			});
			firstData.forEach((item) => {
				const correspondingItem = secondData.find(
					(obj) => obj.label === item.label
				);
				if (correspondingItem) {
					const newData = {
						[`labelLeft`]: item.label,
						[`valueLeft`]: item.value,
						[`labelRight`]: correspondingItem.label,
						[`valueRight`]: correspondingItem.value,
					};

					// Push the new object to the array
					progressData.push(newData);
				}
			});
			createProgressBarsUpdate(progressData);
		} else {
			tradeDataDiv.innerText = "No data found.";
		}
	// }
	})
	.catch((error) => {
	  document.getElementById("progressList").innerText =
	    "Error fetching data.";
	});
}

// get selected country to compare data
function getSelectedDataValues() {
	const firstSelected = document.querySelector(".selectedFirst");
	const secondSelected = document.querySelector(".selectedSecond");
	const firstValue = firstSelected
		? firstSelected.getAttribute("data-value")
		: null;
	const secondValue = secondSelected
		? secondSelected.getAttribute("data-value")
		: null;

	return [firstValue, secondValue];
}

function scrollToTradeData() {
	const tradeDataDiv = document.getElementById("tradeDataUpdate");
	if (tradeDataDiv) {
		customScrollTo(tradeDataDiv);
	}
}

function customScrollTo(target) {
	const customGradient = document.querySelector(".custom-gradient");
	let countryComparatorHeight = document.getElementById("countryComparator");
	countryComparatorHeight = 80;

	const totalValue = countryComparatorHeight + customGradient.offsetHeight;

	const startPosition = window.pageYOffset;
	const targetPosition = target.offsetTop - totalValue;
	const distance = targetPosition - startPosition;
	const duration = 1000;
	let startTime = null;

	function animation(currentTime) {
		if (startTime === null) startTime = currentTime;
		const timeElapsed = currentTime - startTime;
		const progress = Math.min(timeElapsed / duration, 1);

		window.scrollTo(0, startPosition + distance * progress);

		if (timeElapsed < duration) {
			requestAnimationFrame(animation);
		}
	}

	requestAnimationFrame(animation);
}

window.addEventListener("scroll", function () {
	const sampleContent = document.getElementById("countryComparator");
	const compareData = document.getElementById("compareData");
	const tradeDataUpdate = document.getElementById("tradeDataUpdate");
	const scrollPosition = window.scrollY;
	const compareDataTop =
		compareData.getBoundingClientRect().top + window.scrollY;
	const tradeDataUpdateBottom =
		tradeDataUpdate.getBoundingClientRect().top +
		window.scrollY +
		tradeDataUpdate.offsetHeight;
	if (
		scrollPosition >= compareDataTop &&
		scrollPosition < tradeDataUpdateBottom
	) {
		sampleContent.classList.remove("uk-hidden");
	} else {
		sampleContent.classList.add("uk-hidden");
	}
});

// fill progress data to each progress bar
function createProgressBarsUpdate(data) {
	let progressBarContainer = "";
	data.forEach((item) => {
		switch (item.labelLeft) {
			case "country_trade":
				progressBarContainer = document.getElementById("country-pg-bar");
				break;
			case "air_trade":
				progressBarContainer = document.getElementById("air-pg-bar");
				break;
			case "ocean_trade":
				progressBarContainer = document.getElementById("ocean-pg-bar");
				break;
			case "basic_raw_materials":
				progressBarContainer = document.getElementById(
					"basic-raw-materials-pg-bar"
				);
				break;
			case "capital_equip_&_machinery":
				progressBarContainer = document.getElementById(
					"capital-equip-machinery-pg-bar"
				);
				break;
			case "chemicals_&_products":
				progressBarContainer = document.getElementById(
					"chemicals-products-pg-bar"
				);
				break;
			case "consumer_fashion_goods":
				progressBarContainer = document.getElementById(
					"consumer-fashion-goods-pg-bar"
				);
				break;
			case "high_technology":
				progressBarContainer = document.getElementById("ht-pg-bar");
				break;
			case "industrial_raw_materials":
				progressBarContainer = document.getElementById("irw-pg-bar");
				break;
			case "land_vehicles_&_parts":
				progressBarContainer = document.getElementById("lvp-pg-bar");
				break;
			case "machinery_parts":
				progressBarContainer = document.getElementById("mp-pg-bar");
				break;
			case "personal_&_household_goods":
				progressBarContainer = document.getElementById("phg-pg-bar");
				break;
			case "temp._or_climate_control":
				progressBarContainer = document.getElementById("tocc-pg-bar");
				break;
			default:
				progressBarContainer = "";
				break;
		}
		if (progressBarContainer != "") {
			progressBarContainer.setAttribute("data-first", item.valueLeft);
			progressBarContainer.setAttribute("data-second", item.valueRight);

			const labelFirst = progressBarContainer.querySelector(".label-left");
			labelFirst.classList.add("uk-position-top-left", "uk-position-z-index");
			labelFirst.textContent = item.valueLeft;

			const progressBar = progressBarContainer.querySelector(".progress-bar");

			const progressLabel = document.createElement("span");
			progressLabel.classList.add(
				"uk-position-absolute",
				"uk-position-z-index",
				"uk-text-center",
				"uk-position-center"
			);
			progressLabel.textContent = item.labelLeft;
			progressBar.appendChild(progressLabel);

			const labelSecond = progressBarContainer.querySelector(".label-right");
			labelSecond.classList.add("uk-position-top-right", "uk-position-z-index");
			labelSecond.textContent = item.valueRight;
		}
	});

	animateBarsOnScroll();
}

function animateBarsOnScroll() {
	const progressContainers = document.querySelectorAll(
		".progress-bar-container"
	);


	progressContainers.forEach((container) => {
		const rect = container.getBoundingClientRect();
		container.classList.add("visible");

		const firstValue = parseInt(container.getAttribute("data-first"));
		const secondValue = parseInt(container.getAttribute("data-second"));
		const fill = container.querySelector(".progress-fill");
		const fillbg = container.querySelector(".progress-fill-bg");

		fill.style.width = "0%";
		fillbg.style.width = "0%";
		fillbg.style.opacity = "0";

		const max = firstValue < secondValue ? secondValue * 2 : firstValue * 2;
		const total = firstValue + secondValue;
		const fillWidth = (total / max) * 100;

		if (firstValue > secondValue) {
			fill.style.left = "0";
			fill.style.right = "unset";
			fillbg.style.left = "0";
			fillbg.style.right = "unset";
		} else {
			fill.style.right = "0";
			fill.style.left = "unset";
			fillbg.style.right = "0";
			fillbg.style.left = "unset";
		}
		setTimeout(() => {
			fill.style.width = fillWidth + "%";
			fillbg.style.width = fillWidth + "%";
			fillbg.style.opacity = "1";
		}, 300);
	});

}

// function to create country img beside of progress bar for desktop
function createCountryImg(container, country) {
	let mapImgPath = "";
	let flagImgPath = "";
	countryImages.forEach((element) => {
		if (element.name == country) {
			mapImgPath = element.mapImgPath;
			flagImgPath = element.flagImgPath;
		}
	});

	const containerDiv = document.createElement("div");
	containerDiv.classList.add("uk-position-relative");
	const img1 = document.createElement("img");
	img1.src = mapImgPath;
	img1.alt = country;
	img1.classList.add("uk-responsive-width", "left-right-map");
	containerDiv.appendChild(img1);
	const innerDiv = document.createElement("div");
	innerDiv.classList.add(
		"uk-position-absolute",
		"uk-position-center",
		"country"
	);
	const img2 = document.createElement("img");
	img2.src = flagImgPath;
	img2.alt = country;
	innerDiv.appendChild(img2);
	containerDiv.appendChild(innerDiv);
	const countrySpan = document.createElement("h3");
	countrySpan.classList.add(
		"uk-text-bold",
		"uk-text-lead",
		"uk-text-center",
		"uk-padding-bottom",
		"uk-block",
		"uk-text-uppercase"
	);
	countrySpan.textContent = country;
	const viewReportBtn = document.createElement("a");
	viewReportBtn.style.width = "100%";
	viewReportBtn.style.height = "48px";
	viewReportBtn.classList.add(
		"uk-button",
		"uk-padding-remove-top",
		"uk-padding-remove-bottom",
		"uk-button-secondary",
		"uk-text-bold",
		"uk-border-rounded",
		"uk-text-capitalize",
		"uk-margin-top"
	);
	viewReportBtn.textContent = "View report";
	container.appendChild(containerDiv);
	container.appendChild(countrySpan);
	container.appendChild(viewReportBtn);
}

// function to create country img beside of progress bar for mobile
function createCountryImgMb(container, country, year, month) {
	let mapImgPath = "";
	countryImages.forEach((element) => {
		if (element.name == country) {
			flagImgPath = element.flagImgPath;
		}
	});

	const period = document.getElementById("year-month");
	period.innerText = month.toUpperCase() + " " + year;
	const containerDiv = document.createElement("div");
	containerDiv.classList.add("uk-position-relative");
	const img1 = document.createElement("img");
	img1.src = flagImgPath;
	img1.alt = country;
	img1.classList.add("uk-responsive-width");
	containerDiv.appendChild(img1);
	const countrySpan = document.createElement("h3");
	countrySpan.classList.add(
		"uk-text-bold",
		"uk-text-lead",
		"uk-text-center",
		"uk-padding-bottom",
		"uk-block",
		"uk-margin-remove",
		"uk-text-uppercase"
	);
	countrySpan.textContent = country;
	container.appendChild(containerDiv);
	container.appendChild(countrySpan);
}

window.addEventListener("scroll", animateBarsOnScroll);
animateBarsOnScroll();

// set Month and year in the menu data select
function setMonthYear(range, year, selectedMonth = null) {
	const selectElement = document.getElementById("compareMonth");
	selectElement.innerHTML = "";
	range.forEach((month) => {
		const option = document.createElement("option");
		option.value = month + year;
		option.textContent = fullMonthNames[month] + " " + year;
		option.setAttribute(
			"data-month",
			fullMonthNames[month].toLocaleLowerCase()
		);
		option.setAttribute("data-year", year);
		selectElement.appendChild(option);
	});

	const selectedOptionSec = selectElement.querySelector(
		`option[value="${selectedMonth}"]`
	);
	if (selectedOptionSec) {
		selectedOptionSec.selected = true;
	} else {
		selectElement.selectedIndex = selectElement.options.length - 1;
	}
}

// set month to show data by clicking month for mobile
function setMonthMb(range) {
	const monthCompareMb = document.getElementById("month-compare-mb");
	monthCompareMb.innerHTML = "";
	range.forEach((month, index) => {
		const wrapperDiv = document.createElement("div");
		wrapperDiv.className =
			"month-button-wrapper uk-text-center uk-padding uk-padding-remove-left uk-width-1-3 uk-position-relative";

		if (index === range.length - 1) {
			wrapperDiv.classList.add("uk-active");
		}
		const monthButton = document.createElement("a");
		monthButton.className =
			"uk-text-bold uk-text-capitalize uk-block uk-text-small uk-text-secondary";
		monthButton.setAttribute("data-uk-smooth-scroll", "");
		monthButton.innerText = fullMonthNames[month];
		monthButton.setAttribute("data-month", fullMonthNames[month]);

		wrapperDiv.appendChild(monthButton);
		monthCompareMb.appendChild(wrapperDiv);

		monthButton.addEventListener("click", function (event) {
			event.preventDefault();
			const allMonthButtons = monthCompareMb.querySelectorAll(
				".month-button-wrapper"
			); 
			allMonthButtons.forEach((button) => {
				button.classList.remove("uk-active");
			});
			this.parentElement.classList.add("uk-active");
			const selectedMonth = this.getAttribute("data-month").toLocaleLowerCase();

			fetchDataFromWordPress(selectedPostIds, startYear, selectedMonth);

			scrollToTradeData();

			const compareMonth = document.getElementById("compareMonth");
			Array.from(compareMonth.options).forEach((option) => {
				if (
					option.getAttribute("data-month").toLocaleLowerCase() ===
					selectedMonth.toLocaleLowerCase()
				) {
					option.selected = true;
				} else {
					option.selected = false;
				}
			});

			const monthDisplay = document.getElementById("monthDisplay");
			const monthButtonDesk = monthDisplay.querySelectorAll(
				".month-button-wrapper"
			);
			monthButtonDesk.forEach((btn) => {
				const childEle = btn.querySelector("a");
				childEle.classList.remove("uk-active");
				if (
					childEle.getAttribute("data-month").toLocaleLowerCase() ==
					selectedMonth.toLocaleLowerCase()
				) {
					childEle.classList.add("uk-active");
				}
			});
		});
	});
}

// set month to show data by clicking month for desktop
function setMonthDes(range) {
	const monthDisplayDiv = document.getElementById("monthDisplay");
	monthDisplayDiv.innerHTML = "";

	range.forEach((month, index) => {
		const wrapperDiv = document.createElement("div");
		wrapperDiv.className =
			"month-button-wrapper custom-padding uk-position-relative";
		const monthButton = document.createElement("a");
		monthButton.style.width = "147px";
		monthButton.style.height = "40px";
		if (index === range.length - 1) {
			monthButton.className =
				"uk-button uk-padding-remove-top uk-padding-remove-bottom uk-button-secondary uk-text-bold uk-border-rounded uk-text-capitalize uk-active";
		} else {
			monthButton.className =
				"uk-button uk-padding-remove-top uk-padding-remove-bottom uk-button-secondary uk-text-bold uk-border-rounded uk-text-capitalize";
		}
		monthButton.setAttribute("data-uk-smooth-scroll", "");
		monthButton.innerText = fullMonthNames[month];
		monthButton.setAttribute("data-month", fullMonthNames[month]);

		monthButton.addEventListener("click", function (event) {
			event.preventDefault();
			const allMonthButtons = monthDisplayDiv.querySelectorAll("div > a"); // Adjust selector as needed
			allMonthButtons.forEach((button) => {
				button.classList.remove("uk-active");
			});
			this.classList.add("uk-active");
			const selectedMonth = this.getAttribute("data-month").toLocaleLowerCase();

			fetchDataFromWordPress(selectedPostIds, startYear, selectedMonth);

			scrollToTradeData();

			const compareMonth = document.getElementById("compareMonth");
			Array.from(compareMonth.options).forEach((option) => {
				if (
					option.getAttribute("data-month").toLocaleLowerCase() ===
					selectedMonth.toLocaleLowerCase()
				) {
					option.selected = true;
				} else {
					option.selected = false;
				}
			});

			const monthDisplay = document.getElementById("month-compare-mb");
			const monthButtonDesk = monthDisplay.querySelectorAll(
				".month-button-wrapper"
			);

			monthButtonDesk.forEach((btn) => {
				const childEle = btn.querySelector("a");
				btn.classList.remove("uk-active");
				if (
					childEle.getAttribute("data-month").toLocaleLowerCase() ==
					selectedMonth.toLocaleLowerCase()
				) {
					btn.classList.add("uk-active");
				}
			});
		});
		wrapperDiv.appendChild(monthButton);
		monthDisplayDiv.appendChild(wrapperDiv);
	});
}

// can't select second country in the first select and can't select first country in the second slect
function disableSelectedCountry(selectedCountry) {
	const firstCountrySelect = document.getElementById("firstCountrySelect");
	Array.from(firstCountrySelect.options).forEach((option) => {
		option.disabled = false;
	});
	const disabledOption = firstCountrySelect.querySelector(
		`option[value="${selectedCountry[1]}"]`
	);
	if (disabledOption) disabledOption.disabled = true;
	const selectedOption = firstCountrySelect.querySelector(
		`option[value="${selectedCountry[0]}"]`
	);
	if (selectedOption) selectedOption.selected = true;

	const secondCountrySelect = document.getElementById("secondCountrySelect");
	Array.from(secondCountrySelect.options).forEach((option) => {
		option.disabled = false;
	});
	const disabledOptionSec = secondCountrySelect.querySelector(
		`option[value="${selectedCountry[0]}"]`
	);
	if (disabledOptionSec) disabledOptionSec.disabled = true;
	const selectedOptionSec = secondCountrySelect.querySelector(
		`option[value="${selectedCountry[1]}"]`
	);
	if (selectedOptionSec) selectedOptionSec.selected = true;
}

// 
function onCountryChange() {
	const firstCountry = document.getElementById("firstCountrySelect").value;
	if (firstCountry) {
		updateCountryOnMap(firstCountry, "selectedFirst");
	}

	const secondCountry = document.getElementById("secondCountrySelect").value;
	if (secondCountry) {
		updateCountryOnMap(secondCountry, "selectedSecond");
	}
	const compareMonth = document.getElementById("compareMonth");
	const selectedOption = compareMonth.options[compareMonth.selectedIndex];
	const startYear = selectedOption.getAttribute("data-year");
	const selectedMonth = selectedOption.getAttribute("data-month");
	selectedPostIds = [firstCountry, secondCountry];
	fetchDataFromWordPress(selectedPostIds, startYear, selectedMonth);

	const leftContent = document.getElementById("left-content");
	const rightContent = document.getElementById("right-content");
	leftContent.innerHTML = "";
	rightContent.innerHTML = "";
	createCountryImg(leftContent, selectedPostIds[0]);
	createCountryImg(rightContent, selectedPostIds[1]);

	document.getElementById("firstCountryMb").innerText =
		selectedPostIds[0].toLocaleUpperCase();
	document.getElementById("secondCountryMb").innerText =
		selectedPostIds[1].toLocaleUpperCase();
	document.getElementById("reportFirstBtn").innerText =
		"View " + selectedPostIds[0].toLocaleUpperCase() + " Report";
	document.getElementById("reportSecondBtn").innerText =
		"View " + selectedPostIds[1].toLocaleUpperCase() + " Report";

	disableSelectedCountry(selectedPostIds);

	const monthDisplayDiv = document.getElementById("monthDisplay");
	const allMonthButtons = monthDisplayDiv.querySelectorAll("div > a");
	allMonthButtons.forEach((button) => {
		button.classList.remove("uk-active");
	});

	const activeButton = Array.from(allMonthButtons).find(
		(button) =>
			button.getAttribute("data-month").toLocaleLowerCase() ===
			selectedMonth.toLocaleLowerCase()
	);

	if (activeButton) {
		activeButton.classList.add("uk-active");
	}
}

function updateCountryOnMap(country, className) {
	mapContents.forEach((mapContent) => {
		if (mapContent.classList.contains(className)) {
			mapContent.classList.remove(className);
			mapContent.classList.remove("selected");
			mapContent.classList.toggle(
				"uk-disabled",
				!mapContent.classList.contains("selected")
			);
			const index = selectedItems.indexOf(mapContent);

			if (index > -1) {
				mapContent.classList.remove("selectedFirst", "selectedSecond");
				selectedItems.splice(index, 1);
				if (index === 0 && selectedItems[0]) {
					selectedItems[0].classList.remove("selectedSecond");
					selectedItems[0].classList.add("selectedFirst");
				}
			}
		}
		const dataValue = mapContent.getAttribute("data-value");

		if (dataValue === country) {
			mapContent.classList.add(className);
			mapContent.classList.add("selected");
			mapContent.classList.toggle(
				"uk-disabled",
				!mapContent.classList.contains("selected")
			);
			if (selectedItems.length < 2) {
				selectedItems.push(mapContent);
			}
		}
	});
}

document.getElementById("firstCountrySelect").addEventListener("change", onCountryChange);
document.getElementById("secondCountrySelect").addEventListener("change", onCountryChange);
document.getElementById("compareMonth").addEventListener("change", onCountryChange);

const scrollToTopBtn = document.getElementById("changeMap");

scrollToTopBtn.addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		behavior: "smooth",
	});
});

