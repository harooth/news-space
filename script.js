const checker = document.querySelector(".wrapper input");
const banner = document.querySelector(".banner");
const galaxy = document.querySelector(".galaxy");

// let theme = 'light';
// checker.checked = true;
checker.addEventListener("click", function(){
	if(checker.checked)
	{
		applyTheme('dark');
		localStorage.setItem('theme', 'dark');
	}
	else
	{
		applyTheme('light');
		localStorage.setItem('theme', 'light');
	}
});

function applyTheme(theme)
{
	let themeUrl = `theme-${theme}.css`;

	let url = document.querySelector('[title="theme"]').getAttribute('href');
	let newUrl = url.split("theme-");

	document.querySelector('[title="theme"]').setAttribute('href', newUrl[0]+themeUrl);
}



let activeTheme = localStorage.getItem('theme');

if(activeTheme == null || activeTheme == 'light')
{
	applyTheme('light');
	checker.checked = false;
}
else if(activeTheme == 'dark')
{
	checker.checked = true;
	applyTheme('dark');

}