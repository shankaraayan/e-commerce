@extends('Layout.Layout')

@section("style")
 
@endsection

@section("content")
<x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')">agb</x-filtter>


<div class="bg-light-blue pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="agb-content">
                <h1 class="mb-5 fs-3">Allgemeine Geschäftsbedingungen</h1>
                <h5 class="fs-4">Wichtiger Hinweis:</h5>
                <p>Gem. § 12 Abs. 3 Nr. 1 UStG kann bestimmte Ware mit einem Umsatzsteuersatz von 0 % verkauft
                    werden, sofern die rechtlichen Voraussetzungen dieser Norm erfüllt sind.</p>
                <p>Sollten Sie einen Kaufvertrag über eine solche Ware mit einem ausgewiesenen Umsatzsteuersatz von
                    0% abschließen, bestätigen Sie durch den Vertragsschluss ausdrücklich, dass die rechtlichen
                    Voraussetzungen gem. § 12 Abs. 3 Nr. 1 UStG erfüllt sind:<br><strong>a. </strong>Sie sind
                    Betreiber der Photovoltaik-Anlage und <br><strong>b. </strong>Die Photovoltaikanlage wird auf
                    oder in der Nähe von Privatwohnungen, Wohnungen oder öffentlichen oder anderen Gebäuden, die für
                    dem Gemeinwohl dienenden Tätigkeiten genutzt werden, installiert. <br><strong>c. </strong>Sie
                    bestätigen mit Vertragsschluss, dass entweder die installierte Bruttoleistung der
                    Photovoltaikanlage laut Marktstammdatenregister nicht mehr als 30 Kilowatt (peak) beträgt bzw.
                    betragen wird oder bei höherer Bruttoleistung der Photovoltaikanlage die unter Ziffer a. und b.
                    genannten Voraussetzungen trotzdem erfüllt sind.</p>
                <p>Da zu der neuen Gesetzeslage zu § 12 Abs. 3 Nr. 1 UStG noch keine gefestigte Verwaltungspraxis
                    der Finanzbehörden entwickelt wurde, erklären Sie mit Vertragsschluss rein vorsorglich, uns bei
                    Bedarf etwaig noch benötigte Nachweise für das Vorliegen der Voraussetzungen nach § 12 Abs. 3
                    Nr. 1 UStG zur Verfügung zu stellen.</p>
                <h5 class="fs-4">1. Geltungsbereich</h5>
                <p>(1) Diese Allgemeinen Geschäftsbedingungen (im Folgenden: “AGB”) gelten für alle über unseren
                    Online-Shop abgeschlossenen Verträge zwischen uns, den Unternehmen EPP Energy Peak Power GmbH,
                    Neuer Wall 50, 20354 Hamburg und EPP Energy Peak Power India Pvt. Ltd., A-230 Nemi Nagar
                    Extension, Vaishali Nagar, Jaipur – 302021, beide vertreten durch die bevollmächtigten
                    Geschäftsführer Patrick Willemer,<a href="mailto:contact@epp.solar"> contact@epp.solar</a>, +49
                    541 96251000, und Ihnen als unserem Kunden.<br>(2) Alle zwischen Ihnen und uns im Zusammenhang
                    mit dem Kaufvertrag getroffenen Vereinbarungen ergeben sich insbesondere aus diesen
                    Verkaufsbedingungen, unserer schriftlichen Auftragsbestätigung und unserer Annahmeerklärung.
                    <br>(3) Maßgebend ist die jeweils bei Abschluss des Vertrags gültige Fassung der AGB. <br>(4)
                    Abweichende Bedingungen des Kunden akzeptieren wir nicht. Dies gilt auch, wenn wir der
                    Einbeziehung nicht ausdrücklich widersprechen.</p>
                <h5 class="fs-4">2. Vertragsschluss</h5>
                <p>(1) Die Präsentation und Bewerbung von Artikeln in unserem Online-Shop stellt kein bindendes
                    Angebot zum Abschluss eines Kaufvertrags dar Mit dem Absenden einer Bestellung über den
                    Online-Shop durch Anklicken des Buttons „zahlungspflichtig bestellen“ geben Sie eine
                    rechtsverbindliche Bestellung ab. Sie sind an die Bestellung für die Dauer von zwei <br>(2)
                    Wochen nach Abgabe der Bestellung gebunden; Ihr gegebenenfalls bestehendes Recht, Ihre
                    Bestellung zu widerrufen, bleibt hiervon unberührt. <br>(3) Wir werden den Zugang Ihrer über
                    unseren Online-Shop abgegebenen Bestellung unverzüglich per E-Mail bestätigen. In einer solchen
                    E-Mail liegt noch keine verbindliche Annahme der Bestellung, es sei denn, darin wird neben der
                    Bestätigung des Zugangs zugleich die Annahme erklärt. <br>(4) Ein Vertrag kommt erst zustande,
                    wenn wir Ihre Bestellung durch eine Annahmeerklärung oder durch die Lieferung der bestellten
                    Artikel annehmen. <br>(5) Bestellungen von Lieferungen ins Ausland können wir nur ab einem
                    Mindestbestellwert berücksichtigen. Den Mindestbestellwert können Sie den in unserem Online-Shop
                    bereit gestellten Preisinformationen entnehmen.<br> (6) Sollte die Lieferung der von Ihnen
                    bestellten Ware nicht möglich sein, etwa weil die entsprechende Ware nicht auf Lager ist, sehen
                    wir von einer Annahmerklärung ab. In diesem Fall kommt ein Vertrag nicht zustande. Wir werden
                    Sie darüber unverzüglich informieren und bereits erhaltene Gegenleistungen unverzüglich
                    zurückerstatten.<br>(7) Mit Vertragsschluss erklärt der Käufer, dass er Betreiber der
                    Photovoltaikanlage ist und es sich entweder um ein begünstigtes Gebäude handelt oder die
                    installierte Bruttoleistung der Photovoltaikanlage laut MwStR nicht mehr als 30 KW (peak)
                    beträgt oder betragen wird.</p>
                <h5 class="fs-4">3. Lieferbedingungen und Vorbehalt der Vorkassezahlung</h5>
                <p>(1) Wir sind zu Teillieferungen berechtigt, soweit dies für Sie zumutbar ist. <br>(2) Die
                    Lieferfrist beträgt circa fünf XX Werktage, soweit nichts anderes vereinbart wurde. Sie beginnt
                    – vorbehaltlich der Regelung in Abs. 3 – mit Vertragsschluss. <br>(3) Bei Bestellungen von
                    Kunden mit Wohn- oder Geschäftssitz im Ausland oder bei begründeten Anhaltspunkten für ein
                    Zahlungsausfallrisiko behalten wir uns vor, erst nach Erhalt des Kaufpreises nebst Versandkosten
                    zu liefern (Vorkassevorbehalt). Falls wir von dem Vorkassevorbehalt Gebrauch machen, werden wir
                    Sie unverzüglich unterrichten. In diesem Fall beginnt die Lieferfrist mit Bezahlung des
                    Kaufpreises und der Versandkosten.</p>
                <h5 class="fs-4">4. Preise und Versandkosten</h5>
                <p>(1) Sämtliche Preisangaben in unserem Online-Shop sind Bruttopreise inklusive der gesetzlichen
                    Umsatzsteuer und verstehen sich zuzüglich anfallender Versandkosten. <br>(2) Die Versandkosten
                    sind in unseren Preisangaben in unserem Online-Shop angegeben. Der Preis einschließlich
                    Umsatzsteuer und anfallender Versandkosten wird außerdem in der Bestellmaske angezeigt, bevor
                    Sie die Bestellung absenden. <br>(3) Wenn wir Ihre Bestellung durch Teillieferungen erfüllen,
                    entstehen Ihnen nur für die erste Teillieferung Versandkosten. Erfolgen die Teillieferungen auf
                    Ihren Wunsch, berechnen wir für jede Teillieferung Versandkosten. <br>(4) Wenn Sie Ihre
                    Vertragserklärung wirksam widerrufen, können Sie unter den gesetzlichen Voraussetzungen die
                    Erstattung bereits bezahlter Kosten für den Versand zu Ihnen (Hinsendekosten) verlangen.</p>
                <h5 class="fs-4">5. Zahlungsbedingungen und Aufrechnung und Zurückbehaltungsrecht</h5>
                <p>(1) Der Kaufpreis und die Versandkosten sind spätestens binnen zwei (2) Wochen ab Zugang unserer
                    Rechnung zu bezahlen. <br>(2) Sie können den Kaufpreis und die Versandkosten nach Ihrer Wahl nur
                    mit den von uns angebotenen Zahlungsmöglichkeiten bezahlen. <br>(3) Sie sind nicht berechtigt,
                    gegenüber unseren Forderungen aufzurechnen, es sei denn, Ihre Gegenansprüche sind rechtskräftig
                    festgestellt oder unbestritten. Sie sind zur Aufrechnung gegenüber unseren Forderungen auch
                    nicht berechtigt, wenn Sie Mängelrügen oder Gegenansprüche aus dem selben Kaufvertrag geltend
                    machen. <br>(4) Als Käufer dürfen Sie ein Zurückbehaltungsrecht nur dann ausüben, wenn Ihr
                    Gegenanspruch aus demselben Kaufvertrag herrührt.</p>
                <h5 class="fs-4">6. Eigentumsvorbehalt</h5>
                <p>Die gelieferte Ware bleibt bis zur vollständigen Bezahlung des Kaufpreises in unserem Eigentum.
                </p>
                <h5 class="fs-4">7. Gewährleistung</h5>
                <p>(1) Wir haften für Sach- oder Rechtsmängel gelieferter Artikel nach den geltenden gesetzlichen
                    Vorschriften, insbesondere §§ 434 ff. BGB. Die Verjährungsfrist für gesetzliche Mängelansprüche
                    beträgt zwei Jahre und beginnt mit der Ablieferung der Ware. (2) Etwaige von uns gegebene
                    Verkäufergarantien für bestimmte Artikel oder von den Herstellern bestimmter Artikel eingeräumte
                    Herstellergarantien treten neben die Ansprüche wegen Sach- oder Rechtsmängeln im Sinne von Abs.
                    1. Einzelheiten des Umfangs solcher Garantien ergeben sich aus den Garantiebedingungen, die den
                    Artikeln gegebenenfalls beiliegen.</p>
                <h5 class="fs-4">8. Haftung</h5>
                <p>(1) Wir haften Ihnen gegenüber in allen Fällen vertraglicher und außervertraglicher Haftung bei
                    Vorsatz und grober Fahrlässigkeit nach Maßgabe der gesetzlichen Bestimmungen auf Schadensersatz
                    oder Ersatz vergeblicher Aufwendungen. <br>(2) In sonstigen Fällen haften wir – soweit in Abs. 3
                    nicht abweichend geregelt – nur bei Verletzung einer Vertragspflicht, deren Erfüllung die
                    ordnungsgemäße Durchführung des Vertrags überhaupt erst ermöglicht und auf deren Einhaltung Sie
                    als Kunde regelmäßig vertrauen dürfen (so genannte Kardinalpflicht), und zwar beschränkt auf den
                    Ersatz des vorhersehbaren und typischen Schadens. In allen übrigen Fällen ist unsere Haftung
                    vorbehaltlich der Regelung in Abs. 3 ausgeschlossen. <br>(3) Unsere Haftung für Schäden aus der
                    Verletzung des Lebens, des Körpers oder der Gesundheit und nach dem Produkthaftungsgesetz bleibt
                    von den vorstehenden Haftungsbeschränkungen und –ausschlüssen unberührt.</p>
                <h5 class="fs-4">9. Urheberrechte</h5>
                <p>Wir haben an allen Bildern, Filme und Texten, die in unserem Online Shop veröffentlicht werden,
                    Urheberrechte. Eine Verwendung der Bilder, Filme und Texte, ist ohne unsere ausdrückliche
                    Zustimmung nicht gestattet.</p>
                <h5 class="fs-4">10. Anwendbares Recht und Gerichtsstand</h5>
                <p> (1) Es gilt das Recht der Bundesrepublik Deutschland unter Ausschluss des UN-Kaufrechts. Wenn Sie
                    die Bestellung als Verbraucher abgegeben haben und zum Zeitpunkt Ihrer Bestellung Ihren
                    gewöhnlichen Aufenthalt in einem anderen Land haben, bleibt die Anwendung zwingender
                    Rechtsvorschriften dieses Landes von der in Satz 1 getroffenen Rechtswahl unberührt. <br>(2)
                    Wenn Sie Kaufmann sind und Ihren Sitz zum Zeitpunkt der Bestellung in Deutschland haben, ist
                    ausschließlicher Gerichtsstand der Sitz des Verkäufers. Im Übrigen gelten für die örtliche und
                    die internationale Zuständigkeit die anwendbaren gesetzlichen Bestimmungen.</p>
    
            </div>
        </div>
    </div>
</div>


<!-- //Design here -->

@endsection