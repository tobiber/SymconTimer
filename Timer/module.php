<?
    // Klassendefinition
    class Wunderground extends IPSModule {
 
        // Der Konstruktor des Moduls
        // Überschreibt den Standard Kontruktor von IPS
        public function __construct($InstanceID) {
            // Diese Zeile nicht löschen
            parent::__construct($InstanceID);
			
            // Selbsterstellter Code
        }
 
        // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            // Diese Zeile nicht löschen.
            parent::Create();
			
			//Config Form
			$this->RegisterPropertyInteger("TimerEventObject");
			$this->RegisterPropertyInteger("TimerEventObjectOff");
			$this->RegisterPropertyInteger("DiffTimeOff",30);
			
			//Variablenprofil anlegen
			if (!IPS_VariableProfileExists("Timer.Time"))
			{
				IPS_CreateVariableProfile("Timer.Time", 1);
				IPS_SetVariableProfileIcon("Timer.Time","Clock");
				IPS_SetVariableProfileAssociation("Timer.Time",0, "00:00");
				IPS_SetVariableProfileAssociation("Timer.Time",1, "00:15");
				IPS_SetVariableProfileAssociation("Timer.Time",2, "00:30");
				IPS_SetVariableProfileAssociation("Timer.Time",3, "00:45");
				IPS_SetVariableProfileAssociation("Timer.Time",4, "01:00");		
			}
			
			//Variablen anlegen
			$this->RegisterVariableInteger("CreateEventTime","Zeitpunkt","Clock");
	
        }
 
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();
			
			
			// Wenn API gesetzt, dann Script aktiv schalten
			if (strlen($this->ReadPropertyString("TimerEventObject")) > 0)
			{
				//Instanz ist aktiv
				$this->SetStatus(102);
			}
			else
			{
				//Instanz ist inaktiv
				$this->SetStatus(104);
			}
        }		
    }
?>