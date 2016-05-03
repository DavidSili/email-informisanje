# email-informisanje
Program za slanje obaveštenja klijentima na njihove email adrese

Glavni deo ovog programa (adresar za klijente) je napisao jedan drugi programer, zbog čega to nisam podelio ovde. Kada sam dobio ovaj projekat, moj zadatak je bio da ispravim neke od JSON grešaka u kodu glavnog dela i da sa lokalne mreže prenesem na dostupnost preko interneta (što je podrazumevalo login i registraciju korisnika) - što sam i uradio.
Posebni dodatak (što je ovde i publikovano) jeste mala aplikacija za slanje email-ova klijentima. Na osnovu tog koji radnik se ulogovao, samo tim klijentima je mogao da šalje e-mailove za koje je on zadužen (ili u slučaju admina - bilo kome). Postoji mogućnost da se e-mail adrese rasparčaju u različite veličine grupa radi smanjenja mogućnosti za automatskim označivanjem kao spam. Takođe, slanje nije automatski, nego se adrese kopiraju u clip-board a komercijalist ili serviseri ih sa svojih poslovnih adresa paste-uju u polje za adrese kako bi omogućili bolju komunikaciju sa klijentima i da se manje stekne utisak automatizovanosti. Takođe postoji mogućnost i da se šalje samo onima kojima je poslednji email poslat pre određenog vremena ili viljuškar servisiran pre određenog vremena.