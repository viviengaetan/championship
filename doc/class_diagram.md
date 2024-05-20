````mermaid
classDiagram

%% ------------------------GENERIC------------------------
    namespace generic {
    %% https://schema.org/Thing
        class Thing {
            string name
            UUID identifier
            url image
        }

    %% https://schema.org/Person
        class Person {
            string givenName
            string familyName
            date birthDate
            Country nationality
            image
            +age() int
        }
    }

%% ------------------------EVENT------------------------
    namespace event {
        class EventStatusType {
            <<Enumeration>>
            EventCancelled
            EventMovedOnline
            EventPostponed
            EventRescheduled
            EventScheduled
        }

    %% https://schema.org/Event
        class Event {
            DateTime startDate
            Organization|Person organizer
        }

    %% https://schema.org/SportsEvent
        class SportsEvent
    }

    Event <|-- Thing
    EventStatusType --o "1" Event: eventStatus
    Event <|-- SportsEvent
    Participant "0..*" --o "1" SportsEvent: homeTeam
    Participant "0..*" --o "1" SportsEvent: awayTeam

%% ------------------------PARTICIPANT------------------------
    namespace participant {
        class Participant {
            <<Interface>>
        }

    %% https://schema.org/Organization
        class Organization {
            string name
        }

    %% https://schema.org/SportsOrganization
        class SportsOrganization {
            string sport
        }

    %% https://schema.org/SportsTeam
        class SportsTeam {
            Person coach
        }
    }

    Participant <|-- Organization
    Participant <|-- Person

    Organization <|-- SportsOrganization
    SportsOrganization <|-- SportsTeam

    namespace place {
    %% https://schema.org/Place
        class Place {
            <<Interface>>
        }
    %% https://schema.org/Country
        class Country
    %% https://schema.org/City
        class City
    %% https://schema.org/StadiumOrArena
        class Stadium
    }

    Place <|-- Thing
    Country <|-- Place
    City <|-- Place
    Stadium <|-- Place

    Country "0..*" --o "1" City : containedInPlace

````