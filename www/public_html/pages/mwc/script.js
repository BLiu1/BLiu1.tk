var elementSymbols = [],
    elementAtomicWeights = [],
    elementAtomicWeightsBook = [];

elementSymbols = [
	"H",
	"He",
	"Li",
	"Be",
	"B",
	"C",
	"N",
	"O",
	"F",
	"Ne",
	"Na",
	"Mg",
	"Al",
	"Si",
	"P",
	"S",
	"Cl",
	"Ar",
	"K",
	"Ca",
	"Sc",
	"Ti",
	"V",
	"Cr",
	"Mn",
	"Fe",
	"Co",
	"Ni",
	"Cu",
	"Zn",
	"Ga",
	"Ge",
	"As",
	"Se",
	"Br",
	"Kr",
	"Rb",
	"Sr",
	"Y",
	"Zr",
	"Nb",
	"Mo",
	"Tc",
	"Ru",
	"Rh",
	"Pd",
	"Ag",
	"Cd",
	"In",
	"Sn",
	"Sb",
	"Te",
	"I",
	"Xe",
	"Cs",
	"Ba",
	"La",
	"Ce",
	"Pr",
	"Nd",
	"Pm",
	"Sm",
	"Eu",
	"Gd",
	"Tb",
	"Dy",
	"Ho",
	"Er",
	"Tm",
	"Yb",
	"Lu",
	"Hf",
	"Ta",
	"W",
	"Re",
	"Os",
	"Ir",
	"Pt",
	"Au",
	"Hg",
	"Tl",
	"Pb",
	"Bi",
	"Po",
	"At",
	"Rn",
	"Fr",
	"Ra",
	"Ac",
	"Th",
	"Pa",
	"U",
	"Np",
	"Pu",
	"Am",
	"Cm",
	"Bk",
	"Cf",
	"Es",
	"Fm",
	"Md",
	"No",
	"Lr",
	"Rf",
	"Db",
	"Sg",
	"Bh",
	"Hs",
	"Mt",
	"Ds",
	"Rg",
	"Cn",
	"Uut",
	"Fl",
	"Uup",
	"Lv",
	"Uus",
	"Uuo"
];

elementAtomicWeights = [
	1.008,
	4.002602,
	6.94,
	9.0121831,
	10.81,
	12.011,
	14.007,
	15.999,
	18.998403163,
	20.1797,
	22.98976928,
	24.305,
	26.9815385,
	28.085,
	30.973761998,
	32.06,
	35.45,
	39.948,
	39.0983,
	40.078,
	44.955908,
	47.867,
	50.9415,
	51.9961,
	54.938044,
	55.845,
	58.933194,
	58.6934,
	63.546,
	65.38,
	69.723,
	72.630,
	74.921595,
	78.971,
	79.904,
	83.798,
	85.4678,
	87.62,
	88.90584,
	91.224,
	92.90637,
	95.95,
	97,
	101.07,
	102.90550,
	106.42,
	107.8682,
	112.414,
	114.818,
	118.710,
	121.760,
	127.60,
	126.90447,
	131.293,
	132.90545196,
	137.327,
	138.90547,
	140.116,
 	140.90766,
	144.242,
	145,
	150.36,
	151.964,
	157.25,
	158.92535,
	162.500,
	164.93033,
	167.259,
	168.93422,
	173.054,
	174.9668,
	178.49,
	180.94788,
	183.84,
	186.207,
	190.23,
	192.217,
	195.084,
	196.966569,
	200.592,
	204.38,
	207.2,
	208.98040,
	209,
	210,
	222,
	223,
	226,
	227,
	232.0377,
	231.03588,
	238.02891,
	237,
	244,
	243,
	247,
	247,
	251,
	252,
	257,
	258,
	259,
	262,
	267,
	270,
	271,
	270,
	277,
	276,
	281,
	282,
	285,
	285,
	289,
	289,
	293,
	294,
	294
];

elementAtomicWeightsBook = [
	1.00794,
	4.002602,
	6.941,
	9.012182,
	10.811,
	12.0107,
	14.0067,
	15.9994,
	18.998403,
	20.1797,
	22.989770,
	24.3050,
	26.981538,
	28.0855,
	30.973761,
	32.065,
	35.453,
	39.948,
	39.0983,
	40.078,
	44.955910,
	47.867,
	50.9415,
	51.9961,
	54.938049,
	55.845,
	58.933194,
	58.6934,
	63.546,
	65.39,
	69.723,
	72.64,
	74.92160,
	78.96,
	79.904,
	83.80,
	85.4678,
	87.62,
	88.90585,
	91.224,
	92.90638,
	95.94,
	98,
	101.07,
	102.90550,
	106.42,
	107.8682,
	112.411,
	114.818,
	118.710,
	121.760,
	127.60,
	126.90447,
	131.293,
	132.90545,
	137.327,
	138.9055,
	140.116,
 	140.90765,
	144.24,
	145,
	150.36,
	151.964,
	157.25,
	158.9253,
	162.50,
	164.93032,
	167.259,
	168.93421,
	173.04,
	174.967,
	178.49,
	180.9479,
	183.84,
	186.207,
	190.23,
	192.217,
	195.078,
	196.96655,
	200.59,
	204.3833,
	207.2,
	208.98038,
	208.98,
	209.99,
	222.02,
	223.02,
	226.03,
	227.03,
	232.0381,
	231.03588,
	238.02891,
	237.05,
	244.06,
	243.06,
	247.07,
	247.07,
	251.08,
	252.08,
	257.10,
	258.10,
	259.10,
	262.11,
	261.11,
	262.11,
	266.12,
	264.12,
	269.13,
	268.14,
	271.15,
	272.15,
	277,
	284,
	289,
	288,
	292,
	294,
	294
];

function checkValid (str) { // checks for valid characters
	var str = str.toString();
	if (str == "") return 0;
	var validChars = "ABCDEFGHIKLMNOPRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789()." ;
	for (var i = 0; i <= str.length - 1; i++) {
		if (validChars.indexOf(str.charAt(i)) == -1) {
			var character = str.charAt(i);
			if (character == " ") {
				character = 'spaces';
			}
			alert("Not allowed: " + character);
			return 0;
		}
	}
	return 1;
}

function checkAtom (atom) { // checks for atom in array elementSymbols
	var atom = atom.toString();
	for (var i = 0; i < elementSymbols.length; i++) {
		if (atom == elementSymbols[i]) {
			return 1;
		}
	}
	alert("No such element:" + atom);
	return 0;
}

function splitString (str) { // splits formula string into formula components
	var str = str.toString(),
	    arr = [],
	    lower = "abcdefghijklmnopqrstuvwxyz",
	    digits = "0123456789";
	for (var i = 0; i < str.length; i++) {
		var c = str.charAt(i),
		    d = (i == str.length - 1) ? "Q" /* placeholder for end of string*/ : str.charAt(i + 1); // otherwise next character 
		switch(c) {
			case "(":
			case ")":
			case ".":
				arr[arr.length] = c;
				break;
			case "A":
			case "B":
			case "C":
			case "D":
			case "E":
			case "F":
			case "G":
			case "H":
			case "I":
			case "J":
			case "K":
			case "L":
			case "M":
			case "N":
			case "O":
			case "P":
			case "Q":
			case "R":
			case "S":
			case "T":
			case "U":
			case "V":
			case "W":
			case "X":
			case "Y":
			case "Z":
				arr[arr.length] = c;
				if ((digits.indexOf(d) == -1) && (lower.indexOf(d) == -1)) { // if next digit is not a number or lowercase letter, append "1" to array
					arr[arr.length] = "1";
				};
				break;
			case "a":
			case "b":
			case "c":
			case "d":
			case "e":
			case "f":
			case "g":
			case "h":
			case "i":
			case "j":
			case "k":
			case "l":
			case "m":
			case "n":
			case "o":
			case "p":
			case "q":
			case "r":
			case "s":
			case "t":
			case "u":
			case "v":
			case "w":
			case "x":
			case "y":
			case "z":
				if (i == 0) {
					alert("Capitalization Error");
					return [];
				} else {
					arr[arr.length - 1] += c;
				};
				if ((digits.indexOf(d) == -1) && (lower.indexOf(d) == -1)) { // if next digit is not a number or lowercase letter, append "1" to array
					arr[arr.length] = "1";
				};
				break;
			case "1":
			case "2":
			case "3":
			case "4":
			case "5":
			case "6":
			case "7":
			case "8":
			case "9":
			case "0":
				if (!isNaN(str.charAt(i - 1))) {
					arr[arr.length - 1] += c;
				} else {
					arr[arr.length] = c;
				};
				break;
			default:
				alert("Invalid Characters");
				return [];
				break;
		}
	};
	return arr;
}

function splitArray (arr) { // splits array of formula components into parenthesized groups
	var multiplier = 1;
	for (var i = arr.length - 1; i >= 0; i--) { // multiplies subscripts by subscript of parentheses
		if (!isNaN(arr[i]) && arr[i - 1] == ")") { // assigns multiplier
			multiplier = parseInt(arr[i]);
		} else if (arr[i] == "(") { // exit parentheses
			multiplier = 1;
		};
		if (!isNaN(arr[i])) { // multiply
			var product = parseInt(arr[i]) * multiplier;
			arr[i] = product.toString();
		};
		if (arr[i] == ".") { // if there's a dot
			if (!isNaN(arr[i + 1])) { // gets multiplier
				multiplier = parseInt(arr[i + 1]);
			};
			for (var j = (i + 3); j < arr.length; j++) { // multiplies numbers after dot by multiplier
				if (!isNaN(arr[j])) {
					var product = parseInt(arr[j]) * multiplier;
					arr[j] = product.toString();
				};
			};
			multiplier = 1;
		};
	};
	for (var i = arr.length - 1; i >= 0; i--) {
		if (arr[i] == "(") { // removes open parenthesis
			arr.splice(i, 1);
		} else if (arr[i] == ")" || arr[i] == ".") { // remove close parenthesis, dot, and multiplier
			arr.splice(i, 2);
		};
	};
	return arr;
}

function countAtoms (arr) { // counts and adds atoms to an object
	var obj = {};
	for (var i = 0; i < arr.length; i++) { // check for parentheses or dot
		if (arr[i] == "(" || arr[i] == ".") {
			arr = splitArray(arr);
			break;
		};
	};
	for (var i = 0; i < arr.length; i++) {
		if (isNaN(arr[i]) && checkAtom(arr[i])) {
			if (isNaN(obj[arr[i]])) {
				obj[arr[i]] = 0;
			}
			obj[arr[i]] += parseInt(arr[i + 1]);
		};
	};
	return obj;
}

function formatAtomCount (obj) {
	var str = "";
	str = JSON.stringify(obj, null, 1);
	str = str.slice(1, -1);
	str = str.replace(/"/g, "");
	str = str.replace(/,/g, "");
	return str;
}

function displayAtomCount (str) {
	document.getElementById("atoms_result").value = str;
	return;
}

function calculateWeight (obj) {
	var weightsArr = [];
	for (element in obj) { // puts an array of individual weights together
		var place = elementSymbols.indexOf(element),
		    weight = new BigNumber(elementAtomicWeights[place]),
		    quantity = obj[element];
		weightsArr.push(weight.times(quantity));
	};

	var result = new BigNumber(0);
	for (var i = 0; i < weightsArr.length; i++) { // adds weights without floating point errors
		result = new BigNumber(result.plus(weightsArr[i]));
	};

	return result.toString();
}

function displayWeight (num) {
	document.getElementById("weight_result").value = num.toString();
	return;
}

function calculate () {
	var formula = document.getElementById("formula").value,
	    splitFormula = []
	    atomCount = {}
	    atomCountReadable = "",
	    formulaWeight = "";

	if (checkValid(formula)) {
		splitFormula = splitString(formula);
			console.log("splitFormula: " + JSON.stringify(splitFormula));
		atomCount = countAtoms(splitFormula);
			console.log("atomCount: " + JSON.stringify(atomCount, null, 4));
		atomCountReadable = formatAtomCount(atomCount);
		displayAtomCount(atomCountReadable);
		formulaWeight = calculateWeight(atomCount);
		displayWeight(formulaWeight);
	}
}

function swapSource (event) {
	var tmp = window.elementAtomicWeights;
	window.elementAtomicWeights = window.elementAtomicWeightsBook;
	window.elementAtomicWeightsBook = tmp;
	//swaps two variables
	console.log("Source swap!");
	document.getElementById("source").value = (elementAtomicWeights[0] == 1.00794) ? "Textbook" : "Web";
	calculate();
}

document.getElementById("swap").addEventListener("click", swapSource, false);
document.getElementById("submit").addEventListener("click", calculate, false);
window.addEventListener("keydown",
	function(e){
		if(e.keyCode === 13) {
			calculate();
		}
	},
	false
);
