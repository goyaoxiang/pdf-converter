import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.Loader;
import org.apache.pdfbox.text.PDFTextStripper;

import java.io.File;
import java.io.IOException;
import java.io.PrintWriter;

public class PDFToText {
    public static void main(String[] args) {
        String inputFilePath = args[0];
        String outputFilePath = args[1];
        PDDocument doc = null;
        String text = null;

        try {
            doc = Loader.loadPDF(new File(inputFilePath));
            PDFTextStripper stripper = new PDFTextStripper();
            text = stripper.getText(doc);
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

        try (PrintWriter out = new PrintWriter(outputFilePath)) { // the output text file
            out.println(text);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
