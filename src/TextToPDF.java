import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.pdmodel.PDPage;
import org.apache.pdfbox.pdmodel.PDPageContentStream;
import org.apache.pdfbox.pdmodel.font.PDType1Font;
import org.apache.pdfbox.pdmodel.font.Standard14Fonts;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class TextToPDF {
    public static void main(String[] args) {
        String inputFilePath = args[0];
        String outputFileName = args[1];
        PDDocument doc = null;
        PDPage page = null;

        try {
            doc = new PDDocument();
            page = new PDPage();

            doc.addPage(page);
            PDPageContentStream content = new PDPageContentStream(doc, page);

            content.beginText();
            content.setFont(new PDType1Font(Standard14Fonts.FontName.HELVETICA_BOLD), 12);
            content.newLineAtOffset(100, 700);

            BufferedReader br = new BufferedReader(new FileReader(inputFilePath));
            String line;
            while ((line = br.readLine()) != null) {
                content.showText(line);
                content.newLineAtOffset(0, -15);
            }

            content.endText();
            content.close();
            doc.save(outputFileName); // the output PDF file
            br.close();

        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            if (doc != null) {
                try {
                    doc.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }
    }
}
