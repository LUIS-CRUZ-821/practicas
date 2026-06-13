import org.jpl7.*;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Map;

public class AppRedes extends JFrame {

    private JTextField txtEquipos;
    private JComboBox<String> cbPresupuesto;
    private JComboBox<String> cbSeguridad;
    private JTextArea txtResultado;

    public AppRedes() {
        setTitle("Asesor Experto de Topologías de Red");
        setSize(450, 350);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLayout(new BorderLayout());

        // Panel de entrada
        JPanel panelEntrada = new JPanel(new GridLayout(4, 2, 10, 10));
        panelEntrada.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));

        panelEntrada.add(new JLabel("Número de equipos:"));
        txtEquipos = new JTextField("20");
        panelEntrada.add(txtEquipos);

        panelEntrada.add(new JLabel("Presupuesto disponible:"));
        cbPresupuesto = new JComboBox<>(new String[]{"bajo", "medio", "alto"});
        panelEntrada.add(cbPresupuesto);

        panelEntrada.add(new JLabel("Tolerancia a fallas requerida:"));
        cbSeguridad = new JComboBox<>(new String[]{"baja", "media", "alta"});
        panelEntrada.add(cbSeguridad);

        JButton btnConsultar = new JButton("Recomendar Topología");
        panelEntrada.add(new JLabel("")); // Espaciador
        panelEntrada.add(btnConsultar);

        add(panelEntrada, BorderLayout.NORTH);

        // Panel de resultado
        txtResultado = new JTextArea();
        txtResultado.setEditable(false);
        txtResultado.setFont(new Font("Consolas", Font.PLAIN, 14));
        add(new JScrollPane(txtResultado), BorderLayout.CENTER);

        // Inicializar Prolog
        inicializarProlog();

        // Acción del botón
        btnConsultar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                ejecutarConsultaProlog();
            }
        });
    }

    private void inicializarProlog() {
        // Cargar el archivo de Prolog
        String archivoPL = "asesor_redes.pl";
        Query cargarQuery = new Query("consult", new Term[] {new Atom(archivoPL)});
        
        if (cargarQuery.hasSolution()) {
            txtResultado.setText("Base de conocimientos de Prolog cargada correctamente.\n");
        } else {
            txtResultado.setText("Error: No se pudo cargar " + archivoPL + ".\nAsegúrate de que esté en la raíz del proyecto.\n");
        }
    }

    private void ejecutarConsultaProlog() {
        txtResultado.setText(""); // Limpiar
        
        String numEquipos = txtEquipos.getText();
        String presupuesto = cbPresupuesto.getSelectedItem().toString();
        String seguridad = cbSeguridad.getSelectedItem().toString();

        // Construir la consulta: recomendar_red(Equipos, Presupuesto, Seguridad, TopologiaRecomendada)
        // Usamos la variable Prolog 'Topologia' (mayúscula) para capturar el resultado
        String stringConsulta = String.format("recomendar_red(%s, %s, %s, Topologia)", numEquipos, presupuesto, seguridad);
        
        Query consulta = new Query(stringConsulta);

        if (consulta.hasSolution()) {
            txtResultado.append("Basado en sus requerimientos, recomendamos:\n\n");
            // Iterar si hay múltiples soluciones
            while (consulta.hasMoreSolutions()) {
                Map<String, Term> solucion = consulta.nextSolution();
                txtResultado.append("-> Arquitectura: " + solucion.get("Topologia").toString().toUpperCase() + "\n");
            }
        } else {
            txtResultado.append("No se encontró una topología que cumpla con TODOS\nlos criterios especificados.\nIntente aumentar el presupuesto o reducir equipos.");
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            new AppRedes().setVisible(true);
        });
    }
}