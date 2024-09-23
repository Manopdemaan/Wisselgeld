# Wisselgeld Calculator - PHP

## Omschrijving

Dit project is een PHP-script dat berekent hoeveel wisselgeld in biljetten en munten moet worden teruggegeven voor een ingevoerd bedrag. Het script kan zowel hele euro's als centen berekenen en maakt gebruik van validatie om ervoor te zorgen dat de invoer geldig is. Als de invoer ongeldig is, wordt een gebruiksvriendelijke foutmelding weergegeven.

Het programma rekent met de beschikbare euro-biljetten en munten, en zorgt ervoor dat het wisselgeld efficiënt wordt berekend. Hierbij wordt ook rekening gehouden met afronding naar 5 cent, zoals in de echte wereld vaak gebeurt.

## Functionaliteiten

- Controleert of de invoer geldig is (positief getal).
- Berekent hoeveel biljetten en munten (vanaf 1 cent tot 50 euro) nodig zijn om het wisselgeld terug te geven.
- Berekent het wisselgeld in zowel hele euro's als centen.
- Zorgt voor nette foutmeldingen bij ongeldige invoer (zoals niet-numerieke waarden of lege invoer).

## Hoe het script werkt

1. **Validatie van de invoer**  
   De functie `validateInput($input)` controleert of het ingevoerde bedrag geldig is. Als het bedrag leeg is, geen numerieke waarde bevat of negatief is, wordt een foutmelding gegeven en stopt het programma.

2. **Berekening van wisselgeld**  
   Het wisselgeld wordt berekend met behulp van twee functies:
   - `calculateChangeInMoneys($changeInCents)`: Berekent hoeveel biljetten en grote munten (zoals 50 euro, 10 euro, 1 euro) nodig zijn.
   - `calculateChangeInCents($changeInCents)`: Berekent hoeveel kleinere munten (zoals 50 cent, 20 cent, 5 cent) nodig zijn.

3. **Foutafhandeling**  
   Het script maakt gebruik van een `try-catch` blok om eventuele fouten (zoals ongeldige invoer) op te vangen en deze netjes aan de gebruiker te tonen.


