// The autoComplete.js Engine instance creator
const autoCompleteJS = new autoComplete({
  name: "food & drinks",
  data: {
    src: async function () {
      // Loading placeholder text
      document.querySelector("#autoComplete").setAttribute("placeholder", "Loading...");
      // Fetch External Data Source
      const source = await fetch("./db/restaurants.json");
      const data = await source.json();
      // Post Loading placeholder text
      document.querySelector("#autoComplete").setAttribute("placeholder", autoCompleteJS.placeHolder);
      // Returns Fetched data
      return data;
    },
    key: ["id", "Restoranas", "Virtuvė", "Maistas"],
  },
  trigger: {
    event: ["input", "focus"],
  },
  placeHolder: "Ieškokite maisto arba restoranų!",
  searchEngine: "strict",
  highlight: true,
  maxResults: 5,
  resultItem: {
    content: (data, element) => {
      // Prepare Value's Key
      const key = Object.keys(data).find((key) => data[key] === element.innerText);
      // Modify Results Item
      element.style = "display: flex; justify-content: space-between;";
      element.innerHTML = `<span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
        ${element.innerHTML}</span>
        <span style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase; color: rgba(0,0,0,.2);">
      ${key}</span>`;
    },
  },
  noResults: (dataFeedback, generateList) => {
    // Generate autoComplete List
    generateList(autoCompleteJS, dataFeedback, dataFeedback.results);
    // No Results List Item
    const result = document.createElement("li");
    result.setAttribute("class", "no_result");
    result.setAttribute("tabindex", "1");
    result.innerHTML = `<span style="display: flex; align-items: center; font-weight: 100; color: rgba(0,0,0,.2);">Neradome rezultatų "${dataFeedback.query}"</span>`;
    document.querySelector(`#${autoCompleteJS.resultsList.idName}`).appendChild(result);
  },
  onSelection: (feedback) => {
    document.querySelector("#autoComplete").blur();
    // Prepare User's Selected Value
    const selection = feedback.selection.value[feedback.selection.key];
    // Render selected choice to selection div
    // document.querySelector(".selection").innerHTML = selection;
    // Replace Input value with the selected value
    document.querySelector("#autoComplete").value = selection;
    // Console log autoComplete data feedback
    //console.log(feedback.selection.value.Restoranas);
    window.location.href = "order.php?restaurant_id="+feedback.selection.value.id;
  
  },
});



