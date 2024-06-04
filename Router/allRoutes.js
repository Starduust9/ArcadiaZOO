import Route from "./Route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html"),
    new Route("/habitats", "Habitats", "/pages/habitats.html"),
    new Route("/Service", "Service", "/pages/service.html"),
    new Route("/contact", "Contact", "/pages/contact.html", "/js/contact.js"),

];

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "Arcadia ZOO";